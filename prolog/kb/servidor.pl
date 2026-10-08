:- encoding(utf8).
% ============================================================================
% Puente HTTP/JSON para el motor Prolog del chatbot (contrato JSON v2).
%
%   Arranque:  swipl prolog/kb/servidor.pl                 (puerto 8081)
%              swipl prolog/kb/servidor.pl --port=9000
%   Variables: PROLOG_PORT, PROLOG_HOST (127.0.0.1), PROLOG_LIMITE (segundos)
%
% Rutas:  GET /salud   POST /consulta   POST /evaluar
%
% El puente NO contiene reglas de negocio. Solo:
%   1. valida el JSON de entrada (422 si es invalido),
%   2. llama a consultar/3 o evaluar/5 definidos en hechos.pl / reglas.pl,
%   3. valida la Salida que devuelven las reglas,
%   4. anade version, kb_version, tramite_id e intencion y responde.
% ============================================================================
:- module(puente, []).

:- use_module(library(http/thread_httpd)).
:- use_module(library(http/http_dispatch)).
:- use_module(library(http/http_json)).
:- use_module(library(time)).
:- use_module(library(lists)).
:- use_module(library(apply)).
:- use_module(library(pairs)).

:- dynamic kb_cargada/1, kb_dir/1.

:- prolog_load_context(directory, Dir), asserta(kb_dir(Dir)).

:- initialization(arrancar, main).

:- http_handler(root(salud),    manejar_salud,    []).
:- http_handler(root(consulta), manejar_consulta, []).
:- http_handler(root(evaluar),  manejar_evaluar,  []).

intenciones_consulta([ consultar_requisitos, consultar_documentos,
                       consultar_costo, consultar_plazo, consultar_descripcion ]).

% ----------------------------------------------------------------------------
% Arranque y carga del conocimiento
% ----------------------------------------------------------------------------

arrancar :-
    puerto(Port),
    ( getenv('PROLOG_HOST', Host) -> true ; Host = '127.0.0.1' ),
    cargar_conocimiento,
    http_server(http_dispatch, [port(Host:Port)]),
    format(user_error, "Puente Prolog escuchando en http://~w:~w~n", [Host, Port]),
    thread_get_message(_).               % mantiene vivo el proceso

puerto(Port) :-
    current_prolog_flag(argv, Argv), member(A, Argv),
    atom_concat('--port=', PA, A), atom_number(PA, Port), !.
puerto(Port) :- getenv('PROLOG_PORT', A), atom_number(A, Port), !.
puerto(8081).

limite(L) :- getenv('PROLOG_LIMITE', A), atom_number(A, L), !.
limite(2.5).

% Se carga UNA sola vez y todo o nada: si falta un archivo, no hay version
% valida y el motor queda "no_listo" (nunca mezcla versiones a medias).
cargar_conocimiento :-
    retractall(kb_cargada(_)),
    kb_dir(Dir),
    catch(( forall(member(F, [hechos, reglas]), cargar_archivo(Dir, F)),
            comprobar_predicados,
            obtener_kb_version(V) ),
          E,
          ( print_message(error, E), fail )),
    !,
    asserta(kb_cargada(V)),
    format(user_error, "Conocimiento cargado: kb_version=~s~n", [V]).
cargar_conocimiento :-
    format(user_error, "AVISO: conocimiento NO cargado; /salud respondera no_listo.~n", []).

cargar_archivo(Dir, Nombre) :-
    file_name_extension(Nombre, pl, Archivo),
    directory_file_path(Dir, Archivo, Ruta),
    ( exists_file(Ruta) -> true ; throw(error(existence_error(file, Ruta), _)) ),
    load_files(user:Ruta, [if(true), silent(true)]).

comprobar_predicados :-
    forall(member(PI, [consultar/3, evaluar/5]),
           ( current_predicate(user:PI) -> true
           ; throw(error(existence_error(procedure, PI), _)) )).

obtener_kb_version(V) :-
    findall(X, user:kb_version(X), [V0]),     % exactamente una version
    text_to_string(V0, V).

% ----------------------------------------------------------------------------
% Manejadores
% ----------------------------------------------------------------------------

manejar_salud(_Request) :-
    (   kb_cargada(V)
    ->  reply_json_dict(_{version:2, estado:listo, kb_version:V}, [status(200)])
    ;   reply_json_dict(_{version:2, estado:no_listo, kb_version:null}, [status(503)])
    ).

manejar_consulta(Request) :- atender(consulta, Request).
manejar_evaluar(Request)  :- atender(evaluar,  Request).

atender(Op, Request) :-
    catch(atender_(Op, Request), E, error_inesperado(E)).

atender_(_, Request) :-
    \+ memberchk(method(post), Request), !,
    responder_error(405, datos_invalidos, "Usa el metodo POST.", false, _{}).
atender_(_, _) :-
    \+ kb_cargada(_), !,
    responder_error(503, motor_no_disponible,
                    "El motor no tiene conocimiento cargado.", true, _{}).
atender_(Op, Request) :-
    (   catch(http_read_json_dict(Request, Body), _, fail), is_dict(Body)
    ->  validar_y_ejecutar(Op, Body)
    ;   responder_error(422, datos_invalidos, "El cuerpo debe ser un objeto JSON.",
                        false, _{})
    ).

validar_y_ejecutar(Op, Body) :-
    errores_entrada(Op, Body, Errs),
    (   Errs \== []
    ->  campos_dict(Errs, Campos),
        responder_error(422, datos_invalidos, "Revisa los campos.", false, Campos)
    ;   ejecutar(Op, Body)
    ).

ejecutar(Op, Body) :-
    kb_cargada(KbV),
    get_dict(tramite_id, Body, TS), atom_string(Tramite, TS),
    get_dict(intencion,  Body, IS), atom_string(Intencion, IS),
    limite(Lim),
    (   Op == consulta
    ->  Goal = user:consultar(Intencion, Tramite, Salida0)
    ;   get_dict(perfil, Body, P0), perfil_sin_nulos(P0, Perfil),
        get_dict(fecha, Body, Fecha),
        get_dict(origen_datos, Body, OS), atom_string(Origen, OS),
        Goal = user:evaluar(Tramite, Perfil, Fecha, Origen, Salida0)
    ),
    (   call_with_time_limit(Lim, once(Goal))      % una unica respuesta determinista
    ->  true
    ;   throw(puente_error("Las reglas no produjeron respuesta."))
    ),
    normalizar_salida(Op, Salida0, Salida),
    Resp = Salida.put(_{version:2, kb_version:KbV, tramite_id:Tramite, intencion:Intencion}),
    reply_json_dict(Resp, [status(200)]).

error_inesperado(salida_invalida(Msg)) :- !,
    print_message(error, format("Salida invalida de las reglas: ~w", [Msg])),
    format(string(M), "Las reglas devolvieron una salida invalida: ~w", [Msg]),
    responder_error(500, error_interno, M, false, _{}).
error_inesperado(time_limit_exceeded) :- !,
    responder_error(500, error_interno,
                    "Las reglas excedieron el tiempo permitido.", false, _{}).
error_inesperado(puente_error(Msg)) :- !,
    responder_error(500, error_interno, Msg, false, _{}).
error_inesperado(E) :-
    print_message(error, E),
    responder_error(500, error_interno, "Fallo inesperado en el motor.", false, _{}).

responder_error(Status, Codigo, Mensaje, Reintentable, Campos) :-
    reply_json_dict(_{ version:2,
                       error:_{ codigo:Codigo, mensaje:Mensaje,
                                reintentable:Reintentable, campos:Campos } },
                    [status(Status)]).

campos_dict(Errs, Dict) :-
    msort(Errs, Sorted),
    group_pairs_by_key(Sorted, Grupos),
    dict_create(Dict, _, Grupos).

% ----------------------------------------------------------------------------
% Validacion de la entrada (contrato: nombres y tipos exactos)
% ----------------------------------------------------------------------------

claves_esperadas(consulta, [version, tramite_id, intencion]).
claves_esperadas(evaluar,  [version, tramite_id, intencion, fecha, origen_datos, perfil]).

errores_entrada(Op, B, Errs) :-
    findall(C-M, error_entrada(Op, B, C, M), Errs).

error_entrada(Op, B, K, "Falta la clave.") :-
    claves_esperadas(Op, Ks), member(K, Ks), \+ get_dict(K, B, _).
error_entrada(Op, B, K, "Clave no permitida por el contrato.") :-
    claves_esperadas(Op, Ks), dict_pairs(B, _, Ps), member(K-_, Ps), \+ memberchk(K, Ks).
error_entrada(_, B, version, "Debe ser 2.") :-
    get_dict(version, B, V), V \== 2.
error_entrada(_, B, tramite_id, "Debe ser texto en minusculas, digitos o guion bajo.") :-
    get_dict(tramite_id, B, T), \+ id_valido(T).
error_entrada(Op, B, intencion, "Intencion no valida para esta ruta.") :-
    get_dict(intencion, B, I), \+ intencion_valida(Op, I).
error_entrada(evaluar, B, fecha, "Debe tener formato YYYY-MM-DD valido.") :-
    get_dict(fecha, B, F), \+ fecha_iso_valida(F).
error_entrada(evaluar, B, origen_datos, "Debe ser sesion o manual.") :-
    get_dict(origen_datos, B, O), \+ memberchk(O, ["sesion", "manual"]).
error_entrada(evaluar, B, perfil, "Debe ser un objeto.") :-
    get_dict(perfil, B, P), \+ is_dict(P).
error_entrada(evaluar, B, Campo, Msg) :-
    get_dict(perfil, B, P), is_dict(P),
    dict_pairs(P, _, Ps), member(K-V, Ps), V \== null,
    (   perfil_tipo(K, Tipo)
    ->  \+ valor_valido(Tipo, V), mensaje_tipo(Tipo, Msg)
    ;   Msg = "Campo no permitido en el perfil."
    ),
    atom_concat('perfil.', K, Campo).

intencion_valida(consulta, I) :-
    string(I), atom_string(A, I), intenciones_consulta(L), memberchk(A, L).
intencion_valida(evaluar, "evaluar_elegibilidad").

perfil_tipo(materia_id,       texto).
perfil_tipo(tipo_solicitante, texto).
perfil_tipo(promedio,         porcentaje).
perfil_tipo(asistencia,       porcentaje).

valor_valido(texto, V)      :- string(V), V \== "".
valor_valido(porcentaje, V) :- number(V), V >= 0, V =< 100.

mensaje_tipo(texto,      "Debe ser texto no vacio.").
mensaje_tipo(porcentaje, "Debe ser un numero entre 0 y 100.").

% null o clave ausente = desconocimiento: las reglas no ven las claves nulas.
perfil_sin_nulos(P0, P) :-
    dict_pairs(P0, Tag, Ps0), include(no_nulo, Ps0, Ps), dict_pairs(P, Tag, Ps).
no_nulo(_-V) :- V \== null.

id_valido(S) :-
    string(S), string_length(S, N), N >= 1, N =< 64,
    string_codes(S, Cs), forall(member(C, Cs), id_code(C)).
id_code(C) :- between(0'a, 0'z, C), !.
id_code(C) :- between(0'0, 0'9, C), !.
id_code(0'_).

fecha_iso_valida(S) :-
    string(S),
    split_string(S, "-", "", [Ys, Ms, Ds]),
    string_length(Ys, 4), string_length(Ms, 2), string_length(Ds, 2),
    maplist(solo_digitos, [Ys, Ms, Ds]),
    number_string(Y, Ys), number_string(M, Ms), number_string(D, Ds),
    M >= 1, M =< 12, D >= 1, D =< 31,
    catch(( date_time_stamp(date(Y,M,D,0,0,0,0,-,-), St),
            stamp_date_time(St, date(Y2,M2,D2,_,_,_,_,_,_), 0) ), _, fail),
    Y2 == Y, M2 == M, D2 == D.

solo_digitos(S) :-
    string_codes(S, Cs), Cs \== [], forall(member(C, Cs), between(0'0, 0'9, C)).

% ----------------------------------------------------------------------------
% Validacion de la Salida de las reglas -> JSON del contrato
% ----------------------------------------------------------------------------

salida_error(Fmt, Args) :- format(string(M), Fmt, Args), throw(salida_invalida(M)).

clave(D, K, V) :-
    (   is_dict(D), get_dict(K, D, V0) -> V = V0
    ;   salida_error("falta la clave '~w'", [K]) ).

normalizar_salida(Op, S0, S) :-
    (   is_dict(S0) -> true ; salida_error("Salida no es un dict", []) ),
    clave(S0, items, Is0),         lista(items, Is0),        maplist(texto(items), Is0, Is),
    clave(S0, documentos, Ds0),    lista(documentos, Ds0),   maplist(documento, Ds0, Ds),
    clave(S0, costo, C0),          costo(C0, C),
    clave(S0, plazo, P0),          plazo(P0, P),
    clave(S0, resultado, R0),      resultado(Op, R0, R),
    clave(S0, aviso, A0),          texto_o_nulo(aviso, A0, A),
    S = _{items:Is, documentos:Ds, costo:C, plazo:P, resultado:R, aviso:A}.

lista(Ctx, X) :- ( is_list(X) -> true ; salida_error("'~w' debe ser lista", [Ctx]) ).

texto(_, X, S) :- string(X), !, S = X.
texto(_, X, S) :- atom(X), \+ memberchk(X, [null, true, false]), !, atom_string(X, S).
texto(Ctx, _, _) :- salida_error("'~w' debe ser texto", [Ctx]).

texto_o_nulo(_, null, null) :- !.
texto_o_nulo(Ctx, X, S) :- texto(Ctx, X, S).

booleano(_, X) :- memberchk(X, [true, false]), !.
booleano(Ctx, _) :- salida_error("'~w' debe ser true o false", [Ctx]).

fecha_o_nula(_, null, null) :- !.
fecha_o_nula(Ctx, X, S) :-
    texto(Ctx, X, S),
    ( fecha_iso_valida(S) -> true ; salida_error("'~w' debe ser YYYY-MM-DD", [Ctx]) ).

documento(D, _{id:Id, nombre:N, descripcion:De, obligatorio:O, formato:F, url:U}) :-
    clave(D, id, I0),          texto(id, I0, Id),
    clave(D, nombre, N0),      texto(nombre, N0, N),
    clave(D, descripcion, E0), texto(descripcion, E0, De),
    clave(D, obligatorio, O),  booleano(obligatorio, O),
    clave(D, formato, F0),     texto(formato, F0, F),
    clave(D, url, U0),         texto_o_nulo(url, U0, U).

costo(null, null) :- !.
costo(C0, _{centavos:Cts, moneda:M}) :-
    clave(C0, centavos, Cts), ( integer(Cts) -> true ; salida_error("'centavos' debe ser entero", []) ),
    clave(C0, moneda, M0),    texto(moneda, M0, M).

plazo(null, null) :- !.
plazo(P0, _{texto:T, inicio:I, fin:F}) :-
    clave(P0, texto, T0),  texto(texto, T0, T),
    clave(P0, inicio, I0), fecha_o_nula(inicio, I0, I),
    clave(P0, fin, F0),    fecha_o_nula(fin, F0, F).

resultado(consulta, null, null) :- !.
resultado(consulta, _, _) :- !, salida_error("una consulta debe devolver resultado=null", []).
resultado(evaluar, null, _) :- !, salida_error("una evaluacion no puede devolver resultado=null", []).
resultado(evaluar, R0, _{estado:E, motivos:Ms}) :-
    clave(R0, estado, E0), texto(estado, E0, E),
    (   memberchk(E, ["cumple", "no_cumple", "requiere_revision"]) -> true
    ;   salida_error("estado '~w' no admitido", [E]) ),
    clave(R0, motivos, Ms0), lista(motivos, Ms0), maplist(motivo, Ms0, Ms).

motivo(M0, _{codigo:C, texto:T}) :-
    clave(M0, codigo, C0), texto(codigo, C0, C),
    clave(M0, texto, T0),  texto(texto, T0, T).
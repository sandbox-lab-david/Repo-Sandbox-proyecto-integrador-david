:- encoding(utf8).

% Base de conocimientos del chatbot UEES.
% Avance inicial: catalogo de tramites y un caso ficticio de integracion.
%
% IMPORTANTE:
% - No usar este archivo como normativa institucional confirmada.
% - Los datos de demostracion pertenecen solo a examen_recuperacion.
% - Ausencia de costo NO significa que el tramite sea gratuito.
% - Ausencia de parametro NO significa que se cumpla una condicion.

% Declarar tambien los predicados que aun no tienen hechos.
% Evita errores al consultar informacion todavia no registrada.

:- multifile tramite/2.
:- multifile descripcion/2.
:- multifile requisito/3.
:- multifile documento_def/5.
:- multifile tramite_documento/4.
:- multifile costo/3.
:- multifile plazo_texto/2.
:- multifile parametro/3.
:- multifile tipo_solicitante_permitido/2.
:- multifile estado_conocimiento/2.
:- multifile version_conocimiento/1.

% Una sola version por publicacion.
version_conocimiento("avance-001").

% Compatibilidad con el servidor.pl publicado actualmente.
% El PDF define version_conocimiento/1; el puente consulta kb_version/1.
% Acordar un nombre definitivo con el responsable del puente.
kb_version(Version) :-
    version_conocimiento(Version).

% ------------------------------------------------------------------
% Catalogo: nombres tomados del documento de requerimientos.
% Confirmar estos identificadores con el resto del grupo.
% ------------------------------------------------------------------

tramite(alcance_homologacion, "Alcance de homologacion").
tramite(ayudante_catedra, "Ayudante de catedra").
tramite(cambio_carrera, "Cambio de carrera").
tramite(cambio_malla, "Cambio de malla / pensum").
tramite(cambio_modalidad, "Cambio de modalidad").
tramite(examen_gracia, "Examen de gracia").
tramite(examen_recuperacion, "Examen de recuperacion").
tramite(examen_suficiencia, "Examen de suficiencia").
tramite(examen_supletorio, "Examen supletorio").
tramite(homologacion, "Homologacion").
tramite(incompleto, "Incompleto").
tramite(person_to_person, "Person to Person").
tramite(recalificacion, "Recalificacion de examen").
tramite(registro_extemporaneo, "Registro extemporaneo").
tramite(reincorporacion_carrera, "Reincorporacion a carrera").
tramite(retiro_carrera, "Retiro de carrera").
tramite(retiro_materia, "Retiro de materia").
tramite(retiro_universidad, "Retiro de universidad").
tramite(retiro_extemporaneo, "Retiro extemporaneo").
tramite(tercer_registro, "Tercer registro").

% ------------------------------------------------------------------
% Estado del contenido.
% "pendiente" significa que aun falta completar y validar la ficha.
% No representa una decision sobre la elegibilidad del estudiante.
% ------------------------------------------------------------------

estado_conocimiento(alcance_homologacion, pendiente).
estado_conocimiento(ayudante_catedra, pendiente).
estado_conocimiento(cambio_carrera, pendiente).
estado_conocimiento(cambio_malla, pendiente).
estado_conocimiento(cambio_modalidad, pendiente).
estado_conocimiento(examen_gracia, pendiente).
estado_conocimiento(examen_recuperacion, parcial).
estado_conocimiento(examen_suficiencia, pendiente).
estado_conocimiento(examen_supletorio, pendiente).
estado_conocimiento(homologacion, pendiente).
estado_conocimiento(incompleto, pendiente).
estado_conocimiento(person_to_person, pendiente).
estado_conocimiento(recalificacion, pendiente).
estado_conocimiento(registro_extemporaneo, pendiente).
estado_conocimiento(reincorporacion_carrera, pendiente).
estado_conocimiento(retiro_carrera, pendiente).
estado_conocimiento(retiro_materia, pendiente).
estado_conocimiento(retiro_universidad, pendiente).
estado_conocimiento(retiro_extemporaneo, pendiente).
estado_conocimiento(tercer_registro, pendiente).

% ------------------------------------------------------------------
% Caso FICTICIO para probar estructura e integracion.
% Estos hechos no constituyen requisitos oficiales de la UEES.
% ------------------------------------------------------------------

descripcion(
    examen_recuperacion,
    "Caso de demostracion para probar el chatbot. Informacion normativa pendiente de validacion."
).

requisito(
    examen_recuperacion,
    1,
    "EJEMPLO FICTICIO: presentar un respaldo de calificaciones."
).

documento_def(
    respaldo_calificaciones_demo,
    "Respaldo de calificaciones de demostracion",
    "Documento ficticio utilizado exclusivamente para pruebas.",
    "PDF",
    sin_url
).

tramite_documento(
    examen_recuperacion,
    1,
    respaldo_calificaciones_demo,
    obligatorio
).

parametro(examen_recuperacion, promedio_minimo, 75).

% No se declara costo: es desconocido.
% No se declara plazo: esta pendiente.
% No se declaran solicitantes permitidos hasta confirmar sus
% identificadores y condiciones con el responsable de reglas.
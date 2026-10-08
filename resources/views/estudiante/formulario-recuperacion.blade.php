<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva solicitud de recuperación | Portal del estudiante</title>

    <style>
        * { box-sizing: border-box; }
        [hidden] { display: none !important; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            color: #202939;
        }

        header {
            background: white;
            border-top: 4px solid #781c35;
            border-bottom: 1px solid #e0e4eb;
        }

        .marca {
            max-width: 1150px;
            margin: auto;
            padding: 16px 24px;
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .logo {
            width: 145px;
            height: auto;
        }

        .marca strong {
            padding-left: 22px;
            border-left: 1px solid #e0e4eb;
            color: #781c35;
            font-size: 20px;
        }

        main {
            max-width: 1150px;
            margin: auto;
            padding: 32px 24px;
        }

        a { color: #781c35; }
        h1 { font-size: 30px; line-height: 1.3; margin-bottom: 10px; }
        h2 { margin: 0 0 12px; font-size: 24px; }
        p { line-height: 1.6; }
        .introduccion, .ayuda { color: #596579; }

        .aviso {
            background: #fff3d6;
            padding: 14px 18px;
            border-radius: 10px;
            line-height: 1.6;
            margin: 20px 0;
        }

        .pasos {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            list-style: none;
            padding: 0;
            margin: 28px 0;
        }

        .pasos li {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 8px;
            border-bottom: 3px solid #e0e4eb;
            color: #596579;
            font-size: 14px;
        }

        .pasos .activo {
            border-color: #781c35;
            color: #781c35;
            font-weight: bold;
        }

        .numero {
            display: grid;
            place-items: center;
            width: 32px;
            height: 32px;
            flex-shrink: 0;
            border-radius: 50%;
            background: #e9ecf1;
        }

        .activo .numero { background: #781c35; color: white; }

        .distribucion {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 290px;
            align-items: start;
            gap: 24px;
        }

        .panel {
            background: white;
            border: 1px solid #e0e4eb;
            border-radius: 14px;
            padding: 28px;
            min-width: 0;
        }

        .campos {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
            margin-top: 28px;
        }

        .campo { min-width: 0; }
        .completo { grid-column: 1 / -1; }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 14px;
            border: 1px solid #b8c1ce;
            border-radius: 9px;
            font: inherit;
            font-size: 14px;
            color: #202939;
            background: white;
        }

        textarea { resize: vertical; }

        input[readonly] {
            background: #f5f6fa;
            color: #465166;
        }

        input:focus-visible,
        select:focus-visible,
        textarea:focus-visible,
        a:focus-visible,
        button:focus-visible {
            outline: 3px solid #d9b2bd;
            outline-offset: 3px;
        }

        h2:focus { outline: none; }
        .ayuda { font-size: 12px; margin: 8px 0 0; }

        .confirmacion {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-top: 22px;
            font-weight: normal;
            line-height: 1.6;
        }

        .confirmacion input {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
            margin-top: 3px;
            accent-color: #781c35;
        }

        .acciones {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            border-top: 1px solid #e0e4eb;
            padding-top: 22px;
            margin-top: 24px;
        }

        button {
            border: 0;
            border-radius: 9px;
            padding: 13px 20px;
            font: inherit;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .principal { background: #781c35; color: white; }
        .principal:hover { background: #5d1529; }
        .secundario { background: #f6e8ed; color: #781c35; }

        button:disabled {
            background: #eceef2;
            color: #687386;
            cursor: default;
        }

        .etiqueta {
            color: #781c35;
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        aside h2 { font-size: 23px; margin-top: 20px; line-height: 1.4; }
        aside p { color: #596579; }

        aside a {
            display: inline-block;
            border-top: 1px solid #e0e4eb;
            padding-top: 18px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: bold;
            line-height: 1.5;
        }

        .detalle-materia {
            margin-top: 24px;
            padding: 20px;
            background: #f5f6fa;
            border: 1px solid #e0e4eb;
            border-radius: 10px;
        }

        .detalle-materia h3 { margin: 0 0 16px; font-size: 18px; }

        dl {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
            margin: 0;
        }

        dt { font-size: 12px; color: #596579; margin-bottom: 5px; }
        dd { margin: 0; font-size: 14px; overflow-wrap: anywhere; }
        .seleccion { color: #781c35; font-size: 14px; }

        h3 { font-size: 18px; margin: 0; }
        .error { color: #b42318; font-size: 14px; margin: 12px 0 0; }
        .error:empty { display: none; }

        .requisitos-respaldo,
        .lista-archivos,
        .lista-resumen {
            list-style: none;
            padding: 0;
            margin: 16px 0 0;
        }

        .requisitos-respaldo li {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            padding: 14px 0;
            border-bottom: 1px solid #e0e4eb;
            font-size: 14px;
            line-height: 1.5;
        }

        .estado-requisito { flex-shrink: 0; color: #596579; }
        .estado-requisito.listo { color: #1f7a4d; font-weight: bold; }

        .carga {
            margin-top: 24px;
            padding: 20px;
            border: 1px dashed #b8c1ce;
            border-radius: 10px;
            background: #f5f6fa;
        }

        .carga input { background: white; }

        .lista-archivos li {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 1fr) auto;
            align-items: center;
            gap: 16px;
            padding: 16px 0;
            border-bottom: 1px solid #e0e4eb;
        }

        .lista-archivos li:last-child { border-bottom: 0; }

        .archivo-nombre {
            display: block;
            font-size: 14px;
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        .archivo-tamano { font-size: 12px; color: #596579; }
        .lista-archivos label { margin-bottom: 6px; font-size: 12px; }

        .enlace {
            background: none;
            color: #781c35;
            padding: 6px 0;
            text-decoration: underline;
        }

        .bloque-resumen {
            margin-top: 24px;
            padding: 20px;
            background: #f5f6fa;
            border: 1px solid #e0e4eb;
            border-radius: 10px;
        }

        .encabezado-resumen {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 16px;
        }

        .lista-resumen { margin: 0; font-size: 14px; line-height: 1.6; }

        @media (max-width: 850px) {
            .distribucion { grid-template-columns: 1fr; }
        }

        @media (max-width: 600px) {
            main { padding: 24px 16px; }
            .marca { padding: 14px 16px; gap: 14px; }
            .logo { width: 105px; }
            .marca strong { padding-left: 14px; font-size: 16px; }
            h1 { font-size: 26px; }
            .panel { padding: 22px; }
            .campos, dl { grid-template-columns: 1fr; }
            .lista-archivos li { grid-template-columns: 1fr; }

            .pasos li {
                flex-direction: column;
                text-align: center;
                font-size: 12px;
                padding: 12px 4px;
            }

            .acciones { align-items: stretch; flex-direction: column; }
        }
    </style>
</head>
<body>
    <header>
        <div class="marca">
            <img
                class="logo"
                src="{{ asset('images/estudiante/Logo-UEES.gif') }}"
                alt="Universidad Espíritu Santo"
            >
            <strong>Portal del estudiante</strong>
        </div>
    </header>

    <main>
        <a href="{{ route('estudiante.tramites.recuperacion') }}">
            ← Volver a los requisitos
        </a>

        <h1>Solicitud de examen de recuperación</h1>

        <p class="introduccion">
            Confirma tus datos y completa la información de tu solicitud.
        </p>

        <div class="aviso">
            Vista de demostración con un perfil y materias ficticias.
            Usa datos de prueba. La solicitud todavía no se guarda ni se envía;
            al recargar la página se perderá lo escrito.
        </div>

        <ol class="pasos" aria-label="Pasos de la solicitud">
            <li class="activo" aria-current="step">
                <span class="numero">1</span><span>Tus datos</span>
            </li>
            <li>
                <span class="numero">2</span><span>Tu trámite</span>
            </li>
            <li>
                <span class="numero">3</span><span>Respaldos</span>
            </li>
            <li>
                <span class="numero">4</span><span>Revisar</span>
            </li>
        </ol>

        <div class="distribucion">
            <div>
                <section id="paso-1" class="panel" aria-labelledby="titulo-datos">
                    <h2 id="titulo-datos" tabindex="-1">Primero, tus datos</h2>

                    <p class="introduccion">
                        Revisa tu información personal y de carrera.
                        Si encuentras un error, solicita su actualización
                        a la unidad académica correspondiente.
                        Puedes completar tu celular de contacto.
                    </p>

                    <form id="formulario-datos">
                        <div class="campos">
                            <div class="campo completo">
                                <label for="nombre">Nombres y apellidos</label>
                                <input id="nombre" type="text"
                                    value="Estudiante de demostración" readonly>
                            </div>

                            <div class="campo">
                                <label for="codigo">Código estudiantil</label>
                                <input id="codigo" type="text"
                                    value="2026000001" readonly>
                            </div>

                            <div class="campo">
                                <label for="cedula">Cédula o pasaporte</label>
                                <input id="cedula" type="text"
                                    placeholder="No disponible en el perfil de prueba"
                                    readonly>
                            </div>

                            <div class="campo">
                                <label for="facultad">Facultad</label>
                                <input id="facultad" type="text"
                                    value="Ingeniería" readonly>
                            </div>

                            <div class="campo">
                                <label for="carrera">Carrera actual</label>
                                <input id="carrera" type="text"
                                    value="Ingeniería en Computación" readonly>
                            </div>

                            <div class="campo">
                                <label for="modalidad">Modalidad</label>
                                <input id="modalidad" type="text"
                                    value="Presencial" readonly>
                            </div>

                            <div class="campo">
                                <label for="periodo">Periodo actual</label>
                                <input id="periodo" type="text"
                                    value="Periodo de demostración" readonly>
                            </div>

                            <div class="campo">
                                <label for="correo">Correo institucional</label>
                                <input id="correo" type="email"
                                    value="estudiante.demo@uees.edu.ec" readonly>
                            </div>

                            <div class="campo">
                                <label for="celular">Celular</label>
                                <input id="celular" name="celular" type="tel"
                                    autocomplete="tel"
                                    placeholder="Ingresa tu número de contacto"
                                    required maxlength="20">
                            </div>
                        </div>

                        <label class="confirmacion" for="confirmar-datos">
                            <input id="confirmar-datos" type="checkbox" required>
                            <span>Confirmo que he revisado los datos mostrados.</span>
                        </label>

                        <div class="acciones">
                            <a href="{{ route('estudiante.catalogo') }}">
                                Volver al catálogo
                            </a>

                            <button class="principal" type="submit">
                                Continuar a tu trámite →
                            </button>
                        </div>
                    </form>
                </section>

                <section id="paso-2" class="panel"
                    aria-labelledby="titulo-tramite" hidden>

                    <h2 id="titulo-tramite" tabindex="-1">Ahora, tu trámite</h2>

                    <p class="introduccion">
                        Selecciona la materia y declara tus datos académicos.
                        La asistente verificará la información durante la revisión.
                    </p>

                    <div class="aviso">
                        Recuperación admite una sola materia por solicitud.
                        La selección y los datos declarados no representan
                        una aprobación de elegibilidad.
                    </div>

                    <div class="campos">
                        <div class="campo completo">
                            <label for="materia">Materia de la solicitud</label>
                            <select id="materia" aria-describedby="ayuda-materia"
                                required>
                                <option value="">Selecciona una materia</option>
                            </select>

                            <p id="ayuda-materia" class="ayuda">
                                Lista ficticia para probar el selector.
                                En la versión final se consultarán las materias
                                de tu malla y los cursos del catálogo académico.
                            </p>
                        </div>
                    </div>

                    <p id="seleccion" class="seleccion" role="status">
                        No has seleccionado una materia.
                    </p>

                    <section id="detalle-materia" class="detalle-materia"
                        aria-labelledby="titulo-materia" hidden>
                        <h3 id="titulo-materia">Datos del curso seleccionado</h3>

                        <dl>
                            <div>
                                <dt>Código</dt>
                                <dd id="materia-codigo"></dd>
                            </div>
                            <div>
                                <dt>Nombre</dt>
                                <dd id="materia-nombre"></dd>
                            </div>
                            <div>
                                <dt>Periodo cursado</dt>
                                <dd id="materia-periodo"></dd>
                            </div>
                            <div>
                                <dt>Paralelo</dt>
                                <dd id="materia-paralelo"></dd>
                            </div>
                            <div>
                                <dt>Docente</dt>
                                <dd id="materia-docente"></dd>
                            </div>
                        </dl>
                    </section>

                    <div id="datos-academicos" hidden>
                        <div class="campos">
                            <div class="campo">
                                <label for="estado-materia">
                                    Estado académico declarado
                                </label>
                                <select id="estado-materia" name="estado_materia">
                                    <option value="">Selecciona el estado</option>
                                    <option value="aprobada">Aprobada</option>
                                    <option value="reprobada">Reprobada</option>
                                    <option value="semestre_actual">Semestre actual</option>
                                    <option value="retirada">Retirada</option>
                                </select>
                            </div>

                            <div class="campo">
                                <label for="nota">Nota de la materia</label>
                                <input id="nota" name="nota" type="number"
                                    min="0" max="100" step="0.01"
                                    placeholder="Ej. 65">
                            </div>

                            <div class="campo">
                                <label for="asistencia">
                                    Asistencia (%) — opcional
                                </label>
                                <input id="asistencia" name="asistencia"
                                    type="number" min="0" max="100" step="0.01"
                                    placeholder="Ej. 85">
                                <p class="ayuda">
                                    Completa este dato si lo conoces.
                                </p>
                            </div>

                            <div class="campo">
                                <label for="gpa-periodo">GPA del periodo</label>
                                <input id="gpa-periodo" name="gpa_periodo"
                                    type="number" min="0" max="100" step="0.01"
                                    placeholder="Ej. 78">
                                <p class="ayuda">
                                    Declara el GPA aplicable al periodo
                                    de la materia seleccionada.
                                </p>
                            </div>

                            <div class="campo completo">
                                <label for="historial-recuperacion">
                                    Exámenes de recuperación anteriores
                                </label>
                                <select id="historial-recuperacion"
                                    name="historial_recuperacion">
                                    <option value="">Selecciona una opción</option>
                                    <option value="nunca">
                                        Nunca he rendido un examen de recuperación
                                    </option>
                                    <option value="con_fecha">
                                        He rendido uno y conozco la fecha
                                    </option>
                                    <option value="fecha_desconocida">
                                        He rendido uno, pero no conozco la fecha
                                    </option>
                                    <option value="desconocido">
                                        No puedo confirmar esta información
                                    </option>
                                </select>
                            </div>

                            <div id="campo-fecha" class="campo completo" hidden>
                                <label for="ultima-recuperacion">
                                    Fecha del último examen de recuperación
                                </label>
                                <input id="ultima-recuperacion"
                                    name="ultima_recuperacion" type="date"
                                    disabled>
                            </div>

                            <div class="campo completo">
                                <label for="observacion">
                                    Observación (opcional)
                                </label>
                                <textarea id="observacion" name="observacion"
                                    rows="4" maxlength="2000"
                                    placeholder="Agrega información adicional sobre tu solicitud"></textarea>
                            </div>
                        </div>

                        <p class="ayuda">
                            Los datos académicos son declarados por ti.
                            La información que no puedas confirmar
                            requerirá revisión.
                        </p>
                    </div>

                    <div class="acciones">
                        <button id="volver-datos" class="secundario" type="button">
                            ← Volver a tus datos
                        </button>

                        <button id="continuar-respaldos" class="principal"
                            type="button">
                            Continuar a respaldos →
                        </button>
                    </div>

                    <p class="ayuda">
                        El guardado de borradores estará disponible
                        en una siguiente entrega.
                    </p>
                </section>

                <section id="paso-3" class="panel"
                    aria-labelledby="titulo-respaldos" hidden>

                    <h2 id="titulo-respaldos" tabindex="-1">Tus respaldos</h2>

                    <p class="introduccion">
                        Adjunta los documentos que respaldan tu solicitud
                        e indica a qué requisito corresponde cada uno.
                    </p>

                    <h3>Documentos de este trámite</h3>
                    <ul id="requisitos-respaldo" class="requisitos-respaldo"></ul>

                    <div class="carga">
                        <label for="archivos">Agregar archivos</label>
                        <input id="archivos" type="file" multiple
                            accept=".pdf,.jpg,.jpeg,.png,application/pdf,image/jpeg,image/png"
                            aria-describedby="ayuda-archivos">
                        <p id="ayuda-archivos" class="ayuda">
                            PDF, JPG o PNG. Máximo 10 MB por archivo.
                        </p>
                    </div>

                    <p id="error-archivos" class="error" role="alert"></p>

                    <ul id="lista-archivos" class="lista-archivos"
                        aria-label="Archivos adjuntos"></ul>

                    <p id="sin-archivos" class="ayuda">
                        Todavía no has agregado archivos.
                    </p>

                    <div class="acciones">
                        <button id="volver-tramite" class="secundario" type="button">
                            ← Volver a tu trámite
                        </button>

                        <button id="continuar-revisar" class="principal"
                            type="button">
                            Continuar a revisar →
                        </button>
                    </div>

                    <p class="ayuda">
                        Los archivos se revisan solo en tu navegador;
                        todavía no se suben al servidor.
                    </p>
                </section>

                <section id="paso-4" class="panel"
                    aria-labelledby="titulo-revisar" hidden>

                    <h2 id="titulo-revisar" tabindex="-1">Revisa tu solicitud</h2>

                    <p class="introduccion">
                        Comprueba que todo esté correcto antes de confirmar.
                        Puedes volver a cualquier paso para corregirlo.
                    </p>

                    <section class="bloque-resumen" aria-labelledby="resumen-datos">
                        <div class="encabezado-resumen">
                            <h3 id="resumen-datos">Tus datos</h3>
                            <button class="enlace" type="button" data-ir-a="1"
                                aria-label="Editar tus datos">
                                Editar
                            </button>
                        </div>
                        <dl id="lista-datos"></dl>
                    </section>

                    <section class="bloque-resumen" aria-labelledby="resumen-tramite">
                        <div class="encabezado-resumen">
                            <h3 id="resumen-tramite">Tu trámite</h3>
                            <button class="enlace" type="button" data-ir-a="2"
                                aria-label="Editar tu trámite">
                                Editar
                            </button>
                        </div>
                        <dl id="lista-tramite"></dl>
                    </section>

                    <section class="bloque-resumen"
                        aria-labelledby="resumen-respaldos">
                        <div class="encabezado-resumen">
                            <h3 id="resumen-respaldos">Respaldos</h3>
                            <button class="enlace" type="button" data-ir-a="3"
                                aria-label="Editar tus respaldos">
                                Editar
                            </button>
                        </div>
                        <ul id="lista-respaldos" class="lista-resumen"></ul>
                    </section>

                    <div class="aviso">
                        La pre-validación de elegibilidad todavía no está
                        conectada con el motor de reglas. La asistente
                        revisará tu caso.
                    </div>

                    <label class="confirmacion" for="declaracion">
                        <input id="declaracion" type="checkbox" required>
                        <span>
                            Declaro que la información ingresada es verdadera
                            y que los documentos adjuntos son auténticos.
                        </span>
                    </label>

                    <div class="acciones">
                        <button id="volver-respaldos" class="secundario"
                            type="button">
                            ← Volver a respaldos
                        </button>

                        <button id="confirmar-solicitud" class="principal"
                            type="button">
                            Confirmar solicitud
                        </button>
                    </div>

                    <p id="mensaje-confirmacion" class="seleccion"
                        role="status"></p>
                </section>
            </div>

            <aside class="panel">
                <span class="etiqueta">TENLO PRESENTE</span>

                <h2>Primero el documento. Después, tu firma.</h2>

                <p>
                    Al completar el formulario podrás descargar
                    el documento oficial.
                </p>

                <p>
                    Tu solicitud se enviará a revisión cuando subas
                    el PDF firmado y los respaldos requeridos en este portal.
                </p>

                <a href="{{ route('estudiante.tramites.recuperacion') }}">
                    Ver requisitos de este trámite →
                </a>
            </aside>
        </div>
    </main>

    <script>
        // Cursos ficticios. No incluyen notas, asistencia ni GPA.
        const materias = [
            {
                id: 'calculo-demo',
                codigo: 'MAT202',
                nombre: 'Cálculo II',
                periodo: 'Ordinario I 2026',
                paralelo: 'A',
                docente: 'Docente de prueba A'
            },
            {
                id: 'fisica-demo',
                codigo: 'FIS101',
                nombre: 'Física I',
                periodo: 'Ordinario I 2026',
                paralelo: 'B',
                docente: 'Docente de prueba B'
            },
            {
                id: 'programacion-demo',
                codigo: 'COM203',
                nombre: 'Programación II',
                periodo: 'Ordinario II 2025',
                paralelo: 'A',
                docente: 'Docente de prueba C'
            }
        ];

        const formularioDatos = document.getElementById('formulario-datos');
        const pasos = document.querySelectorAll('.pasos li');
        const selectorMateria = document.getElementById('materia');
        const detalleMateria = document.getElementById('detalle-materia');
        const datosAcademicos = document.getElementById('datos-academicos');
        const historial = document.getElementById('historial-recuperacion');
        const fecha = document.getElementById('ultima-recuperacion');
        const campoFecha = document.getElementById('campo-fecha');

        // Fecha local: evita permitir una recuperación en el futuro.
        const hoy = new Date();
        fecha.max = [
            hoy.getFullYear(),
            String(hoy.getMonth() + 1).padStart(2, '0'),
            String(hoy.getDate()).padStart(2, '0')
        ].join('-');

        materias.forEach(materia => {
            const opcion = document.createElement('option');
            opcion.value = materia.id;
            opcion.textContent =
                `${materia.codigo} — ${materia.nombre} (${materia.periodo}, paralelo ${materia.paralelo})`;
            selectorMateria.append(opcion);
        });

        const titulosPaso = [
            'titulo-datos', 'titulo-tramite', 'titulo-respaldos', 'titulo-revisar'
        ];

        function mostrarPaso(numero) {
            [1, 2, 3, 4].forEach(paso => {
                document.getElementById(`paso-${paso}`).hidden = numero !== paso;
            });

            pasos.forEach((paso, indice) => {
                const activo = indice === numero - 1;
                paso.classList.toggle('activo', activo);

                if (activo) {
                    paso.setAttribute('aria-current', 'step');
                } else {
                    paso.removeAttribute('aria-current');
                }
            });

            document.getElementById(titulosPaso[numero - 1]).focus();
        }

        formularioDatos.addEventListener('submit', evento => {
            evento.preventDefault();

            const celular = document.getElementById('celular');
            celular.value = celular.value.trim();

            if (formularioDatos.reportValidity()) {
                mostrarPaso(2);
            }
        });

        document.getElementById('volver-datos')
            .addEventListener('click', () => mostrarPaso(1));

        selectorMateria.addEventListener('change', () => {
            const materia = materias.find(
                item => item.id === selectorMateria.value
            );

            // Al cambiar de curso se limpian solo los datos de esa materia.
            document.getElementById('estado-materia').value = '';
            document.getElementById('nota').value = '';
            document.getElementById('asistencia').value = '';
            document.getElementById('gpa-periodo').value = '';

            detalleMateria.hidden = !materia;
            datosAcademicos.hidden = !materia;

            if (!materia) {
                document.getElementById('seleccion').textContent =
                    'No has seleccionado una materia.';
                return;
            }

            document.getElementById('materia-codigo').textContent = materia.codigo;
            document.getElementById('materia-nombre').textContent = materia.nombre;
            document.getElementById('materia-periodo').textContent = materia.periodo;
            document.getElementById('materia-paralelo').textContent = materia.paralelo;
            document.getElementById('materia-docente').textContent = materia.docente;

            document.getElementById('seleccion').textContent =
                `Materia seleccionada: ${materia.nombre}.`;
        });

        historial.addEventListener('change', () => {
            const mostrarFecha = historial.value === 'con_fecha';

            campoFecha.hidden = !mostrarFecha;
            fecha.disabled = !mostrarFecha;

            if (!mostrarFecha) {
                fecha.value = '';
            }
        });

        // Paso 2 → 3: valida solo los campos visibles del trámite.
        document.getElementById('continuar-respaldos')
            .addEventListener('click', () => {
                const campos = document.querySelectorAll(
                    '#paso-2 input, #paso-2 select, #paso-2 textarea'
                );

                for (const campo of campos) {
                    if (!campo.disabled && !campo.checkValidity()) {
                        campo.reportValidity();
                        return;
                    }
                }

                mostrarPaso(3);
            });

        document.getElementById('volver-tramite')
            .addEventListener('click', () => mostrarPaso(2));

        // Paso 3: respaldos. Requisitos ficticios del examen de recuperación.
        const requisitosRespaldo = [
            {
                id: 'registro-calificaciones',
                nombre: 'Registro de calificaciones o evidencia de la materia reprobada',
                obligatorio: true
            },
            {
                id: 'otro',
                nombre: 'Otro documento de apoyo',
                obligatorio: false
            }
        ];

        const TAMANO_MAXIMO = 10 * 1024 * 1024;
        const archivos = [];
        const entradaArchivos = document.getElementById('archivos');
        const listaArchivos = document.getElementById('lista-archivos');
        const errorArchivos = document.getElementById('error-archivos');

        function formatearTamano(bytes) {
            return bytes < 1024 * 1024
                ? `${Math.max(1, Math.round(bytes / 1024))} KB`
                : `${(bytes / (1024 * 1024)).toFixed(1)} MB`;
        }

        // Revisa los primeros bytes: no basta con la extensión del nombre.
        async function tipoPorContenido(archivo) {
            const bytes = new Uint8Array(await archivo.slice(0, 8).arrayBuffer());
            const empiezaCon = firma => firma.every((valor, i) => bytes[i] === valor);

            if (empiezaCon([0x25, 0x50, 0x44, 0x46])) return 'PDF';
            if (empiezaCon([0x89, 0x50, 0x4E, 0x47, 0x0D, 0x0A, 0x1A, 0x0A])) return 'PNG';
            if (empiezaCon([0xFF, 0xD8, 0xFF])) return 'JPG';
            return null;
        }

        function pintarRequisitos() {
            const lista = document.getElementById('requisitos-respaldo');
            lista.innerHTML = '';

            requisitosRespaldo.forEach(requisito => {
                const cantidad = archivos.filter(
                    item => item.requisito === requisito.id
                ).length;

                const fila = document.createElement('li');
                const nombre = document.createElement('span');
                const estado = document.createElement('span');

                nombre.textContent = requisito.nombre +
                    (requisito.obligatorio ? ' (obligatorio)' : ' (opcional)');

                estado.className = 'estado-requisito' + (cantidad ? ' listo' : '');
                estado.textContent = cantidad === 0
                    ? 'Pendiente'
                    : `${cantidad} ${cantidad === 1 ? 'archivo' : 'archivos'}`;

                fila.append(nombre, estado);
                lista.append(fila);
            });
        }

        function pintarArchivos() {
            listaArchivos.innerHTML = '';
            document.getElementById('sin-archivos').hidden = archivos.length > 0;

            archivos.forEach((item, indice) => {
                const fila = document.createElement('li');

                const datos = document.createElement('div');
                const nombre = document.createElement('span');
                const tamano = document.createElement('span');
                nombre.className = 'archivo-nombre';
                nombre.textContent = item.archivo.name;
                tamano.className = 'archivo-tamano';
                tamano.textContent = `${item.tipo} · ${formatearTamano(item.archivo.size)}`;
                datos.append(nombre, tamano);

                const campo = document.createElement('div');
                const etiqueta = document.createElement('label');
                const selector = document.createElement('select');
                selector.id = `requisito-archivo-${indice}`;
                selector.required = true;
                etiqueta.htmlFor = selector.id;
                etiqueta.textContent = 'Corresponde a';

                selector.append(new Option('Selecciona el requisito', ''));
                requisitosRespaldo.forEach(requisito => {
                    selector.append(new Option(requisito.nombre, requisito.id));
                });
                selector.value = item.requisito;

                selector.addEventListener('change', () => {
                    item.requisito = selector.value;
                    errorArchivos.textContent = '';
                    pintarRequisitos();
                });
                campo.append(etiqueta, selector);

                const quitar = document.createElement('button');
                quitar.type = 'button';
                quitar.className = 'secundario';
                quitar.textContent = 'Quitar';
                quitar.setAttribute('aria-label', `Quitar ${item.archivo.name}`);
                quitar.addEventListener('click', () => {
                    archivos.splice(indice, 1);
                    pintarArchivos();
                    entradaArchivos.focus();
                });

                fila.append(datos, campo, quitar);
                listaArchivos.append(fila);
            });

            pintarRequisitos();
        }

        entradaArchivos.addEventListener('change', async () => {
            const rechazados = [];

            for (const archivo of entradaArchivos.files) {
                const repetido = archivos.some(item =>
                    item.archivo.name === archivo.name &&
                    item.archivo.size === archivo.size &&
                    item.archivo.lastModified === archivo.lastModified
                );

                if (repetido) continue;

                if (archivo.size > TAMANO_MAXIMO) {
                    rechazados.push(`${archivo.name} supera los 10 MB`);
                    continue;
                }

                const tipo = await tipoPorContenido(archivo);

                if (!tipo) {
                    rechazados.push(`${archivo.name} no es un PDF, JPG o PNG válido`);
                    continue;
                }

                // Si solo hay un requisito pendiente obligatorio, se sugiere ese.
                const pendiente = requisitosRespaldo.find(requisito =>
                    requisito.obligatorio &&
                    !archivos.some(item => item.requisito === requisito.id)
                );

                archivos.push({
                    archivo,
                    tipo,
                    requisito: pendiente ? pendiente.id : ''
                });
            }

            entradaArchivos.value = '';
            errorArchivos.textContent = rechazados.length
                ? `No se agregaron: ${rechazados.join('; ')}.`
                : '';

            pintarArchivos();
        });

        document.getElementById('continuar-revisar')
            .addEventListener('click', () => {
                const sinRequisito = listaArchivos.querySelector('select:invalid');

                if (sinRequisito) {
                    sinRequisito.reportValidity();
                    return;
                }

                const faltantes = requisitosRespaldo.filter(requisito =>
                    requisito.obligatorio &&
                    !archivos.some(item => item.requisito === requisito.id)
                );

                if (faltantes.length) {
                    errorArchivos.textContent =
                        'Falta adjuntar: ' +
                        faltantes.map(item => item.nombre).join('; ') + '.';
                    entradaArchivos.focus();
                    return;
                }

                errorArchivos.textContent = '';
                pintarResumen();
                mostrarPaso(4);
            });

        // Paso 4: resumen editable.
        function textoDe(id) {
            const campo = document.getElementById(id);

            if (campo.tagName === 'SELECT') {
                return campo.value ? campo.selectedOptions[0].textContent.trim() : '';
            }

            return campo.value.trim();
        }

        function pintarLista(idLista, filas) {
            const lista = document.getElementById(idLista);
            lista.innerHTML = '';

            filas.forEach(([titulo, valor]) => {
                const grupo = document.createElement('div');
                const dt = document.createElement('dt');
                const dd = document.createElement('dd');
                dt.textContent = titulo;
                dd.textContent = valor || 'No indicado';
                grupo.append(dt, dd);
                lista.append(grupo);
            });
        }

        function pintarResumen() {
            pintarLista('lista-datos', [
                ['Nombres y apellidos', textoDe('nombre')],
                ['Código estudiantil', textoDe('codigo')],
                ['Carrera', textoDe('carrera')],
                ['Correo institucional', textoDe('correo')],
                ['Celular', textoDe('celular')]
            ]);

            const conFecha = historial.value === 'con_fecha';

            pintarLista('lista-tramite', [
                ['Materia', document.getElementById('materia-codigo').textContent +
                    ' — ' + document.getElementById('materia-nombre').textContent],
                ['Estado declarado', textoDe('estado-materia')],
                ['Nota', textoDe('nota')],
                ['Asistencia (%)', textoDe('asistencia')],
                ['GPA del periodo', textoDe('gpa-periodo')],
                ['Recuperaciones anteriores', textoDe('historial-recuperacion')],
                ...(conFecha
                    ? [['Fecha de la última recuperación', textoDe('ultima-recuperacion')]]
                    : []),
                ['Observación', textoDe('observacion')]
            ]);

            const listaRespaldos = document.getElementById('lista-respaldos');
            listaRespaldos.innerHTML = '';

            archivos.forEach(item => {
                const requisito = requisitosRespaldo.find(
                    r => r.id === item.requisito
                );
                const fila = document.createElement('li');
                fila.textContent = `${item.archivo.name} — ${requisito.nombre}`;
                listaRespaldos.append(fila);
            });

            document.getElementById('mensaje-confirmacion').textContent = '';
        }

        document.querySelectorAll('[data-ir-a]').forEach(boton => {
            boton.addEventListener('click', () => {
                mostrarPaso(Number(boton.dataset.irA));
            });
        });

        document.getElementById('volver-respaldos')
            .addEventListener('click', () => mostrarPaso(3));

        document.getElementById('confirmar-solicitud')
            .addEventListener('click', () => {
                const declaracion = document.getElementById('declaracion');

                if (!declaracion.reportValidity()) return;

                document.getElementById('mensaje-confirmacion').textContent =
                    'Vista de demostración: la solicitud no se guardó. ' +
                    'Cuando el sistema esté conectado, aquí se generará ' +
                    'tu código de solicitud y el documento oficial para firmar.';
            });

        pintarArchivos();
    </script>
</body>
</html>
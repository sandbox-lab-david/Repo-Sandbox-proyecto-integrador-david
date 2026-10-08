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
                            <select id="materia" aria-describedby="ayuda-materia">
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

                        <button type="button" disabled>
                            Continuar a respaldos →
                        </button>
                    </div>

                    <p class="ayuda">
                        El paso de respaldos y el guardado de borradores
                        estarán disponibles en una siguiente entrega.
                        La prevalidación con Prolog todavía no está conectada.
                    </p>
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

        function mostrarPaso(numero) {
            document.getElementById('paso-1').hidden = numero !== 1;
            document.getElementById('paso-2').hidden = numero !== 2;

            pasos.forEach((paso, indice) => {
                const activo = indice === numero - 1;
                paso.classList.toggle('activo', activo);

                if (activo) {
                    paso.setAttribute('aria-current', 'step');
                } else {
                    paso.removeAttribute('aria-current');
                }
            });

            document.getElementById(
                numero === 1 ? 'titulo-datos' : 'titulo-tramite'
            ).focus();
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
    </script>
</body>
</html>
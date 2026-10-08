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
            background: #781c35;
            color: white;
            padding: 22px 24px;
            font-size: 20px;
            font-weight: bold;
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
            margin-top: 28px;
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
    <header>Portal del estudiante</header>

    <main>
        <a href="{{ route('estudiante.tramites.recuperacion') }}">
            ← Volver a los requisitos
        </a>

        <h1>Solicitud de examen de recuperación</h1>

        <p class="introduccion">
            Confirma tus datos y selecciona la materia de tu solicitud.
        </p>

        <div class="aviso">
            Vista de demostración con datos académicos ficticios.
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
                        Completa los campos de prueba y confirma tus datos.
                        En la versión final, el perfil académico se obtendrá
                        del módulo 1.
                    </p>

                    <form id="formulario-datos">
                        <div class="campos">
                            <div class="campo completo">
                                <label for="nombre">Nombres y apellidos</label>
                                <input id="nombre" type="text"
                                    placeholder="Ingresa tus nombres y apellidos"
                                    autocomplete="name" required maxlength="150">
                            </div>

                            <div class="campo">
                                <label for="codigo">Código estudiantil</label>
                                <input id="codigo" type="text"
                                    placeholder="Ej. 2026000001"
                                    inputmode="numeric" maxlength="10"
                                    pattern="[0-9]{10}"
                                    title="Ingresa un código de 10 dígitos."
                                    required>
                                <p class="ayuda">
                                    Para esta demostración usamos 10 dígitos.
                                </p>
                            </div>

                            <div class="campo">
                                <label for="cedula">Cédula</label>
                                <input id="cedula" type="text"
                                    placeholder="No disponible en el perfil de prueba"
                                    readonly>
                                <p class="ayuda">
                                    Este dato es obligatorio en homologación.
                                </p>
                            </div>

                            <div class="campo">
                                <label for="facultad">Facultad</label>
                                <input id="facultad" type="text"
                                    value="Ingeniería" readonly>
                            </div>

                            <div class="campo">
                                <label for="escuela">Escuela</label>
                                <input id="escuela" type="text"
                                    value="Escuela de demostración" readonly>
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
                                <label for="gpa">GPA general</label>
                                <input id="gpa" type="text"
                                    value="78 / 100" readonly>
                            </div>

                            <div class="campo">
                                <label for="correo">Correo institucional</label>
                                <input id="correo" type="email"
                                    value="estudiante.demo@uees.edu.ec" readonly>
                            </div>

                            <div class="campo">
                                <label for="celular">Celular</label>
                                <input id="celular" type="tel"
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
                        Selecciona la materia para la que solicitarás
                        el examen de recuperación.
                    </p>

                    <div class="aviso">
                        Recuperación admite una sola materia por solicitud.
                        La selección no representa una aprobación de elegibilidad.
                    </div>

                    <div class="campos">
                        <div class="campo completo">
                            <label for="materia">Materia de la solicitud</label>
                            <select id="materia" aria-describedby="ayuda-materia">
                                <option value="">Selecciona una materia</option>
                            </select>

                            <p id="ayuda-materia" class="ayuda">
                                Lista ficticia para probar el selector.
                                En la versión final se consultará el historial
                                o la malla del estudiante.
                            </p>
                        </div>
                    </div>

                    <p id="seleccion" class="seleccion" role="status">
                        No has seleccionado una materia.
                    </p>

                    <section id="detalle-materia" class="detalle-materia"
                        aria-labelledby="titulo-materia" hidden>
                        <h3 id="titulo-materia">Datos de la materia</h3>

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
                            <div>
                                <dt>Estado académico</dt>
                                <dd id="materia-estado"></dd>
                            </div>
                        </dl>
                    </section>

                    <div class="campos">
                        <div class="campo">
                            <label for="gpa-periodo">GPA del periodo</label>
                            <input id="gpa-periodo" type="text"
                                placeholder="Se mostrará al elegir una materia"
                                readonly>
                            <p class="ayuda">
                                Dato ficticio del periodo seleccionado.
                            </p>
                        </div>

                        <div class="campo">
                            <label for="ultima-recuperacion">
                                Último examen de recuperación
                            </label>
                            <input id="ultima-recuperacion" type="text"
                                value="Sin registro en el perfil de prueba"
                                readonly>
                            <p class="ayuda">
                                Este dato se obtendrá del historial académico.
                            </p>
                        </div>

                        <div class="campo completo">
                            <label for="observacion">Observación (opcional)</label>
                            <textarea id="observacion" rows="4" maxlength="2000"
                                placeholder="Agrega información adicional sobre tu solicitud"></textarea>
                        </div>
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
        // Datos ficticios: se reemplazarán por el servicio del módulo 1.
        const materias = [
            {
                id: 'calculo-demo',
                codigo: 'MAT202',
                nombre: 'Cálculo II',
                periodo: 'Ordinario I 2026',
                paralelo: 'A',
                docente: 'Docente de prueba A',
                estado: 'Reprobada',
                gpaPeriodo: 78
            },
            {
                id: 'fisica-demo',
                codigo: 'FIS101',
                nombre: 'Física I',
                periodo: 'Ordinario I 2026',
                paralelo: 'B',
                docente: 'Docente de prueba B',
                estado: 'Reprobada',
                gpaPeriodo: 78
            },
            {
                id: 'programacion-demo',
                codigo: 'COM203',
                nombre: 'Programación II',
                periodo: 'Ordinario II 2025',
                paralelo: 'A',
                docente: 'Docente de prueba C',
                estado: 'Reprobada',
                gpaPeriodo: 76
            }
        ];

        const formularioDatos = document.getElementById('formulario-datos');
        const pasos = document.querySelectorAll('.pasos li');
        const selectorMateria = document.getElementById('materia');
        const detalleMateria = document.getElementById('detalle-materia');

        materias.forEach(materia => {
            const opcion = document.createElement('option');
            opcion.value = materia.id;
            opcion.textContent =
                `${materia.codigo} — ${materia.nombre} (${materia.periodo})`;
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

            const titulo = document.getElementById(
                numero === 1 ? 'titulo-datos' : 'titulo-tramite'
            );

            titulo.focus();
        }

        formularioDatos.addEventListener('submit', evento => {
            evento.preventDefault();

            const nombre = document.getElementById('nombre');
            const celular = document.getElementById('celular');

            nombre.value = nombre.value.trim();
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

            detalleMateria.hidden = !materia;

            if (!materia) {
                document.getElementById('seleccion').textContent =
                    'No has seleccionado una materia.';
                document.getElementById('gpa-periodo').value = '';
                return;
            }

            document.getElementById('materia-codigo').textContent = materia.codigo;
            document.getElementById('materia-nombre').textContent = materia.nombre;
            document.getElementById('materia-periodo').textContent = materia.periodo;
            document.getElementById('materia-paralelo').textContent = materia.paralelo;
            document.getElementById('materia-docente').textContent = materia.docente;
            document.getElementById('materia-estado').textContent = materia.estado;
            document.getElementById('gpa-periodo').value =
                `${materia.gpaPeriodo} / 100`;

            document.getElementById('seleccion').textContent =
                `Materia seleccionada: ${materia.nombre}.`;
        });
    </script>
</body>
</html>
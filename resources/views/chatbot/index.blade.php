<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Asistente de trámites · UEES</title>
    <link rel="stylesheet" href="{{ asset('assets/chatbot/chatbot.css') }}">
</head>
<body class="cb">
<div class="cb-pagina">

    <header class="cb-top">
        <img src="{{ asset('assets/chatbot/img/facultad-ingenieria-uees.png') }}" alt="UEES Facultad de Ingeniería">
        <span class="cb-top-titulo">Asistente de trámites</span>
        <a class="cb-top-enlace" href="#">Mis solicitudes</a>
    </header>

    <div class="cb-app">

        <aside class="cb-lateral" aria-label="Trámites">
            <h2>Trámites</h2>
            <label class="cb-buscador">
                <span aria-hidden="true">⌕</span>
                <span class="cb-oculto">Buscar trámite</span>
                <input type="search" placeholder="Buscar">
            </label>

            <p class="cb-grupo">Exámenes</p>
            <ul class="cb-lista">
                <li><button type="button" aria-current="true">Examen de recuperación</button></li>
                <li><button type="button">Examen de gracia</button></li>
                <li><button type="button">Examen supletorio</button></li>
                <li><button type="button">Recalificación</button></li>
            </ul>

            <p class="cb-grupo">Cambios de estudios</p>
            <ul class="cb-lista">
                <li><button type="button">Cambio de carrera</button></li>
                <li><button type="button">Cambio de modalidad</button></li>
                <li><button type="button">Cambio de malla</button></li>
            </ul>

            <p class="cb-grupo">Retiros</p>
            <ul class="cb-lista">
                <li><button type="button">Retiro de materia</button></li>
                <li><button type="button">Retiro de carrera</button></li>
            </ul>
        </aside>

        <main class="cb-chat">
            <div class="cb-chat-cab">
                <div>
                    <strong>Asistente de trámites</strong>
                    <span>Facultad de Ingeniería</span>
                </div>
                <button type="button" class="cb-btn-quieto">Nueva consulta</button>
            </div>

            <div class="cb-conversacion" role="log" aria-live="polite" aria-label="Conversación">
                <div class="cb-conversacion-in">

                    <div class="cb-bot">
                        <span class="cb-autor">Asistente</span>
                        <div class="cb-burbuja">
                            <p>Hola. Te ayudo a saber qué necesitas para tu trámite: requisitos, documentos, costos y plazos.</p>
                            <p>¿Con qué tiene que ver tu consulta?</p>
                        </div>
                    </div>

                    <div class="cb-categorias">
                        <button type="button" class="cb-categoria"><strong>Exámenes</strong><span>Recuperación, gracia, recalificación</span></button>
                        <button type="button" class="cb-categoria"><strong>Cambios de estudios</strong><span>Carrera, modalidad, malla</span></button>
                        <button type="button" class="cb-categoria"><strong>Retiros</strong><span>Materias o carrera</span></button>
                        <button type="button" class="cb-categoria"><strong>Homologación</strong><span>Materias aprobadas</span></button>
                        <button type="button" class="cb-categoria"><strong>Inscripciones</strong><span>Fuera de plazo, tercer registro</span></button>
                        <button type="button" class="cb-categoria"><strong>Otras</strong><span>Ayudantía y más</span></button>
                    </div>

                    <div class="cb-usuario">Examen de recuperación</div>

                    <div class="cb-bot">
                        <span class="cb-autor">Asistente</span>
                        <div class="cb-burbuja"><p>Listo. ¿Qué quieres saber del examen de recuperación?</p></div>
                    </div>

                    <div class="cb-sugerencias">
                        <button type="button" class="cb-sug">¿Qué es este trámite?</button>
                        <button type="button" class="cb-sug">¿Qué requisitos tiene?</button>
                        <button type="button" class="cb-sug">¿Qué documentos necesito?</button>
                        <button type="button" class="cb-sug">¿Cuánto cuesta?</button>
                        <button type="button" class="cb-sug">¿Hasta cuándo puedo pedirlo?</button>
                        <button type="button" class="cb-sug">¿Puedo solicitar este trámite?</button>
                    </div>

                    <div class="cb-usuario">¿Qué documentos necesito?</div>

                    <div class="cb-bot">
                        <span class="cb-autor">Asistente</span>
                        <div class="cb-burbuja">
                            <p class="cb-resp-titulo">Documentos requeridos</p>
                            <p class="cb-resp-texto">Estos son los documentos registrados para este trámite.</p>
                            <ul class="cb-docs">
                                <li class="cb-doc">
                                    <div class="cb-doc-fila"><strong>Solicitud de examen de recuperación</strong><span class="cb-etq">PDF</span></div>
                                    <p>Formulario firmado por el estudiante.</p>
                                    <div class="cb-doc-fila"><span class="cb-etq cb-etq-vino">Obligatorio</span><a class="cb-enlace" href="#">Descargar formato ↓</a></div>
                                </li>
                                <li class="cb-doc">
                                    <div class="cb-doc-fila"><strong>Registro de calificaciones</strong><span class="cb-etq">PDF</span></div>
                                    <p>Evidencia de la materia reprobada.</p>
                                    <div class="cb-doc-fila"><span class="cb-etq cb-etq-vino">Obligatorio</span></div>
                                </li>
                            </ul>
                            <div class="cb-aviso"><b>Regla en revisión</b>La plantilla admite varias materias, pero la regla informada dice una sola. La facultad decide en cada caso.</div>
                            <div class="cb-acciones"><a class="cb-btn cb-btn-primario" href="#">Iniciar esta solicitud →</a></div>
                        </div>
                    </div>

                    <div class="cb-usuario">Física I, promedio 78<small>Datos escritos por mí</small></div>

                    <div class="cb-bot">
                        <span class="cb-autor">Asistente</span>
                        <div class="cb-burbuja">
                            <div class="cb-resultado cb-cumple">
                                <div class="cb-resultado-cab"><span class="cb-res-icono" aria-hidden="true">✓</span><strong>Con estos datos, cumples los requisitos</strong></div>
                                <ul class="cb-check">
                                    <li>Tu promedio de 78 supera el mínimo de 75.</li>
                                    <li>No registras otro examen de recuperación en el último año.</li>
                                </ul>
                            </div>
                            <span class="cb-orientativo">Resultado orientativo</span>
                            <p class="cb-nota">Lo calculé con lo que escribiste. La facultad lo confirma con tus datos oficiales cuando revise la solicitud.</p>
                            <div class="cb-acciones"><a class="cb-btn cb-btn-primario" href="#">Iniciar esta solicitud →</a></div>
                        </div>
                    </div>

                    <div class="cb-usuario">¿Cuánto cuesta?</div>

                    <div class="cb-bot">
                        <span class="cb-autor">Asistente</span>
                        <div class="cb-burbuja cb-burbuja-corta">
                            <span class="cb-escribiendo" aria-label="Buscando la respuesta"><i></i><i></i><i></i></span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="cb-composer">
                <div class="cb-composer-in">
                    <button type="button" class="cb-selector"><span aria-hidden="true">⌕</span><b>Examen de recuperación</b><span>Cambiar</span></button>
                </div>
            </div>
        </main>

    </div>
</div>
</body>
</html>

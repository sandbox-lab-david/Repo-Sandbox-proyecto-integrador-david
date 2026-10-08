<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retiro extemporáneo | Portal del estudiante</title>

    <style>
        * { box-sizing: border-box; }

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
            max-width: 900px;
            margin: auto;
            padding: 32px 24px;
        }

        .volver { color: #781c35; }

        .categoria {
            display: inline-block;
            background: #f6e8ed;
            color: #781c35;
            padding: 6px 12px;
            border-radius: 20px;
            margin-top: 28px;
        }

        h1 { font-size: 32px; line-height: 1.2; }
        h2 { font-size: 21px; margin-top: 0; }
        p, li { line-height: 1.7; }
        li + li { margin-top: 8px; }

        .seccion {
            background: white;
            border: 1px solid #e0e4eb;
            border-radius: 14px;
            padding: 24px;
            margin: 20px 0;
        }

        .aviso {
            background: #fff3d6;
            border-left: 4px solid #b57900;
        }

        .acciones {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        button {
            font: inherit;
            border: 0;
            border-radius: 8px;
            padding: 13px 18px;
            background: #eceef2;
            color: #596579;
        }

        .nota { color: #596579; font-size: 14px; }

        a:focus-visible {
            outline: 3px solid #781c35;
            outline-offset: 4px;
        }

        @media (max-width: 600px) {
            main { padding: 24px 16px; }
            h1 { font-size: 28px; }
            .seccion { padding: 20px; }
            .acciones { flex-direction: column; }
        }
    </style>
</head>
<body>
    <header>Portal del estudiante</header>

    <main>
        <a class="volver" href="{{ route('estudiante.catalogo') }}">
            ← Volver al catálogo
        </a>

        <div>
            <span class="categoria">Retiros y continuidad</span>

            <h1>Retiro extemporáneo</h1>

            <p>
                Presenta una solicitud de retiro de materias fuera
                del plazo ordinario por una circunstancia excepcional.
                Tu caso será revisado por la facultad.
            </p>
        </div>

        <section class="seccion">
            <h2>Requisitos</h2>

            <ul>
                <li>Seleccionar las materias de la solicitud.</li>
                <li>
                    Explicar el motivo excepcional que fundamenta
                    el retiro. Este campo es obligatorio.
                </li>
                <li>
                    Presentar los respaldos que correspondan
                    a la circunstancia indicada, según lo que
                    determine la facultad.
                </li>
            </ul>
        </section>

        <section class="seccion">
            <h2>Documentos de respaldo</h2>

            <p>
                Documentos que permitan revisar el motivo excepcional
                de la solicitud.
            </p>

            <p>
                Por ejemplo, certificados médicos o documentos que
                respalden un accidente o una calamidad doméstica,
                cuando correspondan a tu caso.
            </p>

            <p>
                La facultad debe confirmar los documentos aceptados,
                su formato y cualquier respaldo adicional.
            </p>
        </section>

        <section class="seccion">
            <h2>Plazo indicado</h2>

            <p>
                El plazo y las condiciones para presentar una solicitud
                extemporánea están pendientes de confirmación
                por la facultad.
            </p>
        </section>

        <section class="seccion">
            <h2>Condiciones económicas</h2>

            <p>
                La presentación de la solicitud no elimina
                automáticamente los valores pendientes de pago.
                Consulta con la universidad las condiciones económicas
                aplicables a tu caso.
            </p>
        </section>

        <section class="seccion aviso">
            <h2>Información pendiente de confirmación</h2>

            <p>
                Este trámite requiere revisión manual. Presentar
                un motivo excepcional y sus respaldos no implica
                que el retiro será aprobado automáticamente.
            </p>

            <p>
                Confirma con la facultad la instancia que resolverá
                tu solicitud y sus posibles efectos académicos.
            </p>

            <p>
                Esta ficha es informativa y no representa una
                aprobación de elegibilidad.
            </p>
        </section>

        <section class="seccion">
            <h2>¿Qué sigue?</h2>

            <p>
                Completarás el formulario indicando las materias
                y el motivo excepcional. Adjuntarás los respaldos
                requeridos y descargarás el documento oficial.
                Después deberás firmarlo y subir el PDF firmado
                para enviar la solicitud.
            </p>

            <div class="acciones">
                <button type="button" disabled>
                    Iniciar solicitud
                </button>

                <button type="button" disabled>
                    Consultar chatbot
                </button>
            </div>

            <p class="nota">
                El formulario de este trámite y la conexión con el
                chatbot estarán disponibles en una siguiente entrega.
            </p>
        </section>
    </main>
</body>
</html>
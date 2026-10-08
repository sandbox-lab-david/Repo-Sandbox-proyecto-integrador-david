<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homologación | Portal del estudiante</title>

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
            <span class="categoria">Homologación</span>

            <h1>Homologación</h1>

            <p>
                Solicita el reconocimiento de estudios realizados
                en una institución de procedencia. Revisa las
                condiciones antes de iniciar tu solicitud.
            </p>
        </div>

        <section class="seccion">
            <h2>Requisitos</h2>

            <ul>
                <li>
                    Las materias deben alcanzar una equivalencia
                    de al menos 80 %, sujeta a evaluación de la comisión.
                </li>
                <li>
                    La antigüedad de los estudios que se evaluarán
                    no debe superar los 10 años.
                </li>
                <li>
                    La solicitud debe ser revisada por la comisión
                    encargada de la homologación.
                </li>
            </ul>
        </section>

        <section class="seccion">
            <h2>Documentos de respaldo</h2>

            <ul>
                <li>Documento de identidad.</li>
                <li>Certificado académico.</li>
                <li>Sílabos de las materias que se evaluarán.</li>
            </ul>

            <p>
                Confirma con la facultad cuáles documentos deben
                estar legalizados y el formato requerido para
                presentar cada respaldo.
            </p>
        </section>

        <section class="seccion">
            <h2>Plazo indicado</h2>

            <p>
                El plazo para presentar la solicitud está pendiente
                de confirmación por la facultad.
            </p>

            <p>
                El límite de 10 años corresponde a la antigüedad
                de los estudios, no al plazo de presentación.
            </p>
        </section>

        <section class="seccion aviso">
            <h2>Información pendiente de confirmación</h2>

            <p>
                La comisión determina la equivalencia y decide
                sobre la homologación. Cumplir las condiciones
                indicadas no implica una aprobación automática.
            </p>

            <p>
                Confirma con la facultad el plazo, los documentos
                que requieren legalización y los requisitos
                adicionales aplicables.
            </p>

            <p>
                Esta ficha es informativa y no representa una aprobación
                de elegibilidad.
            </p>
        </section>

        <section class="seccion">
            <h2>¿Qué sigue?</h2>

            <p>
                Completarás el formulario indicando la institución
                de procedencia, la carrera de destino, las materias
                y la información adicional de tu caso. Adjuntarás
                los respaldos y descargarás el documento oficial.
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
                El formulario y la conexión con el chatbot estarán
                disponibles en una siguiente entrega.
            </p>
        </section>
    </main>
</body>
</html>
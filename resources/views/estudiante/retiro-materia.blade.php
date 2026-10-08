<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retiro de materia | Portal del estudiante</title>

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

        .costos {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .costos th,
        .costos td {
            padding: 14px 12px;
            border-bottom: 1px solid #e0e4eb;
            text-align: left;
            line-height: 1.5;
        }

        .costos th {
            background: #f6e8ed;
            color: #781c35;
        }

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

            <h1>Retiro de materia</h1>

            <p>
                Solicita el retiro de una o varias materias.
                Revisa el plazo académico y las condiciones económicas
                antes de iniciar tu solicitud.
            </p>
        </div>

        <section class="seccion">
            <h2>Requisitos</h2>

            <ul>
                <li>
                    Presentar la solicitud antes de la semana de
                    exámenes del primer parcial.
                </li>
                <li>
                    Seleccionar las materias que deseas retirar.
                </li>
                <li>
                    Indicar la semana actual del periodo académico.
                </li>
            </ul>
        </section>

        <section class="seccion">
            <h2>Documentos de respaldo</h2>

            <p>
                Los documentos de respaldo específicos para el retiro
                ordinario deben confirmarse con la facultad.
            </p>

            <p>
                Si existe una circunstancia excepcional, consulta los
                requisitos del trámite de Retiro extemporáneo y los
                respaldos que correspondan a tu caso.
            </p>
        </section>

        <section class="seccion">
            <h2>Plazo indicado</h2>

            <p>
                La solicitud debe presentarse antes de la semana de
                exámenes del primer parcial, según el calendario
                del periodo académico.
            </p>
        </section>

        <section class="seccion">
            <h2>Condiciones económicas</h2>

            <table class="costos">
                <caption class="nota">
                    Porcentajes indicados según la semana del periodo
                </caption>
                <thead>
                    <tr>
                        <th scope="col">Semana</th>
                        <th scope="col">Porcentaje de costo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Semana 1</td>
                        <td>25 %</td>
                    </tr>
                    <tr>
                        <td>Semana 2</td>
                        <td>50 %</td>
                    </tr>
                    <tr>
                        <td>Semana 3 en adelante</td>
                        <td>100 %</td>
                    </tr>
                </tbody>
            </table>

            <p>
                El retiro académico no elimina automáticamente los
                valores pendientes de pago. Confirma con la universidad
                la base de cálculo de los porcentajes y el valor
                correspondiente a tu caso.
            </p>
        </section>

        <section class="seccion aviso">
            <h2>Información pendiente de confirmación</h2>

            <p>
                Confirma con la facultad la semana de exámenes del
                primer parcial, los respaldos requeridos y el efecto
                del retiro en tu registro académico.
            </p>

            <p>
                Si el plazo ordinario ya terminó, consulta el trámite
                de Retiro extemporáneo. La aceptación de un caso
                excepcional requiere revisión.
            </p>

            <p>
                Esta ficha es informativa y no representa una aprobación
                de elegibilidad.
            </p>
        </section>

        <section class="seccion">
            <h2>¿Qué sigue?</h2>

            <p>
                Completarás el formulario indicando las materias,
                la semana del periodo y, si corresponde, el motivo.
                Adjuntarás los respaldos requeridos y descargarás
                el documento oficial. Después deberás firmarlo y
                subir el PDF firmado para enviar la solicitud.
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
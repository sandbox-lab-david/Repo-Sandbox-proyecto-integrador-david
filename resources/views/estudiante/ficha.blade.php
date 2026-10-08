<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen de recuperación | Portal del estudiante</title>

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
            <span class="categoria">Evaluaciones</span>
            <h1>Examen de recuperación</h1>
            <p>
                Examen de recuperación para una asignatura reprobada.
                Revisa las condiciones antes de iniciar tu solicitud.
            </p>
        </div>

        <section class="seccion">
            <h2>Requisitos</h2>
            <ul>
                <li>La materia debe constar como reprobada.</li>
                <li>No debe existir un registro de fraude académico en esa materia.</li>
                <li>El GPA aplicable debe ser de al menos 75 sobre 100.</li>
                <li>No haber rendido un examen de recuperación en los últimos 365 días.</li>
                <li>Seleccionar una sola materia por solicitud.</li>
            </ul>
        </section>

        <section class="seccion">
            <h2>Documento de respaldo</h2>
            <p>
                Registro de calificaciones o evidencia de la materia reprobada.
            </p>
        </section>

        <section class="seccion">
            <h2>Plazo indicado</h2>
            <p>
                Se solicita al finalizar el semestre. El examen se rinde
                hasta la primera semana del periodo siguiente.
            </p>
        </section>

        <section class="seccion aviso">
            <h2>Condición pendiente de confirmación</h2>
            <p>
                Por ahora, selecciona una sola materia por solicitud. Esta condición está pendiente de confirmación por la facultad.
            </p>
            <p>
                Esta ficha es informativa y no representa una aprobación
                de elegibilidad.
            </p>
        </section>

        <section class="seccion">
            <h2>¿Qué sigue?</h2>
            <p>
                Completarás el formulario, adjuntarás los respaldos y
                descargarás el documento oficial. Después deberás firmarlo
                y subir el PDF firmado para enviar la solicitud.
            </p>

            <div class="acciones">
                <button type="button" disabled>Iniciar solicitud</button>
                <button type="button" disabled>Consultar chatbot</button>
            </div>

            <p class="nota">
                El formulario y la conexión con el chatbot estarán
                disponibles en una siguiente entrega.
            </p>
        </section>
    </main>
</body>
</html>
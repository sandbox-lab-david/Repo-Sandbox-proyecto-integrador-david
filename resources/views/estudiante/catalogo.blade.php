<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trámites | Portal del estudiante</title>

    <style>
        * {
            box-sizing: border-box;
        }

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
        }

        header strong {
            font-size: 20px;
        }

        main {
            max-width: 1100px;
            margin: auto;
            padding: 36px 24px;
        }

        h1 {
            margin: 0 0 12px;
        }

        .introduccion {
            color: #596579;
            line-height: 1.6;
        }

        .aviso {
            background: #fff3d6;
            padding: 14px;
            border-radius: 10px;
            margin: 24px 0;
            line-height: 1.5;
        }

        .controles {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 16px;
            margin: 24px 0;
        }

        .controles > div {
            min-width: 0;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input,
        select {
            width: 100%;
            padding: 13px;
            border: 1px solid #b8c1ce;
            border-radius: 8px;
            font: inherit;
            background: white;
            color: #202939;
        }

        input:focus,
        select:focus {
            outline: 3px solid #d9b2bd;
            border-color: #781c35;
        }

        .resultado {
            color: #596579;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .tarjetas {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            align-items: stretch;
        }

        .tarjeta {
            min-width: 0;
            background: white;
            border: 1px solid #e2e5ec;
            border-radius: 16px;
            padding: 24px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            box-shadow: 0 4px 14px rgba(32, 41, 57, 0.04);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .tarjeta:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 22px rgba(32, 41, 57, 0.08);
        }

        .tarjeta .categoria {
            margin: 0 0 16px;
            padding: 6px 11px;
            border-radius: 20px;
            background: #f6e8ed;
            color: #781c35;
            font-size: 12px;
            font-weight: bold;
            line-height: 1.4;
        }

        .tarjeta h2 {
            margin: 0 0 12px;
            font-size: 20px;
            line-height: 1.35;
            overflow-wrap: anywhere;
        }

        .tarjeta .descripcion {
            margin: 0 0 24px;
            color: #596579;
            font-size: 14px;
            line-height: 1.6;
        }

        .tarjeta .acciones {
            width: 100%;
            margin-top: auto;
        }

        .enlace-ficha,
        .tarjeta button {
            display: block;
            width: 100%;
            padding: 12px 16px;
            border: 0;
            border-radius: 9px;
            font: inherit;
            font-size: 14px;
            font-weight: bold;
            line-height: 1.4;
            text-align: center;
        }

        .enlace-ficha {
            background: #781c35;
            color: white;
            text-decoration: none;
            transition: background 0.2s;
        }

        .enlace-ficha:hover {
            background: #5d1529;
        }

        .enlace-ficha:focus-visible {
            outline: 3px solid #781c35;
            outline-offset: 4px;
        }

        .tarjeta button:disabled {
            background: #f0f1f5;
            color: #687386;
            cursor: default;
        }

        .tarjeta .pendiente {
            margin: 10px 0 0;
            font-size: 12px;
            line-height: 1.5;
            text-align: center;
            color: #687386;
        }

        [hidden] {
            display: none !important;
        }

        #vacio {
            text-align: center;
            padding: 32px;
            background: white;
            border: 1px solid #e2e5ec;
            border-radius: 12px;
            line-height: 1.6;
        }

        @media (max-width: 850px) {
            .tarjetas {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 600px) {
            main {
                padding: 24px 16px;
            }

            .controles,
            .tarjetas {
                grid-template-columns: 1fr;
            }

            h1 {
                font-size: 28px;
            }

            .tarjeta {
                padding: 22px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .tarjeta,
            .enlace-ficha {
                transition: none;
            }

            .tarjeta:hover {
                transform: none;
            }
        }
    </style>
</head>
<body>
    <header>
        <strong>Portal del estudiante</strong>
    </header>

    <main>
        <h1>Trámites estudiantiles</h1>

        <p class="introduccion">
            Encuentra el trámite que necesitas y consulta sus requisitos
            antes de iniciar una solicitud.
        </p>

        <div class="aviso">
            Catálogo de demostración. Puedes consultar la ficha de
            Examen de recuperación. Las demás fichas y el envío de
            solicitudes estarán disponibles proximamente.
        </div>

        <section class="controles" aria-label="Buscar y filtrar trámites">
            <div>
                <label for="busqueda">Buscar trámite</label>
                <input
                    id="busqueda"
                    type="search"
                    placeholder="Ejemplo: recuperación, retiro, homologación"
                >
            </div>

            <div>
                <label for="categoria">Categoría</label>
                <select id="categoria">
                    <option value="">Todas las categorías</option>
                    <option>Homologación</option>
                    <option>Apoyo académico</option>
                    <option>Cambios académicos</option>
                    <option>Evaluaciones</option>
                    <option>Registro</option>
                    <option>Retiros y continuidad</option>
                </select>
            </div>
        </section>

        <p id="resultado" class="resultado" role="status"></p>

        <section
            id="tarjetas"
            class="tarjetas"
            aria-label="Trámites disponibles"
        ></section>

        <div id="vacio" hidden>
            No encontramos trámites con esos filtros.
            Prueba otro nombre o selecciona todas las categorías.
        </div>
    </main>

    <script>

        const fichas = {
            'Examen de recuperación':
                "{{ route('estudiante.tramites.recuperacion') }}",
            'Examen de gracia':
                "{{ route('estudiante.tramites.gracia') }}",
            'Ayudante de cátedra':
                "{{ route('estudiante.tramites.ayudante') }}",
            'Tercer registro':
                "{{ route('estudiante.tramites.tercer-registro') }}",
            'Recalificación de examen':
                "{{ route('estudiante.tramites.recalificacion') }}",
            'Examen supletorio':
                "{{ route('estudiante.tramites.supletorio') }}",
            'Homologación':
                "{{ route('estudiante.tramites.homologacion') }}",
        };

        const tramites = [
            { nombre: 'Alcance de homologación', categoria: 'Homologación' },
            { nombre: 'Ayudante de cátedra', categoria: 'Apoyo académico' },
            { nombre: 'Cambio de carrera', categoria: 'Cambios académicos' },
            { nombre: 'Cambio de malla / pénsum', categoria: 'Cambios académicos' },
            { nombre: 'Cambio de modalidad', categoria: 'Cambios académicos' },
            { nombre: 'Examen de gracia', categoria: 'Evaluaciones' },
            { nombre: 'Examen de recuperación', categoria: 'Evaluaciones' },
            { nombre: 'Examen de suficiencia', categoria: 'Evaluaciones' },
            { nombre: 'Examen supletorio', categoria: 'Evaluaciones' },
            { nombre: 'Homologación', categoria: 'Homologación' },
            { nombre: 'Incompleto', categoria: 'Retiros y continuidad' },
            { nombre: 'Person to Person', categoria: 'Apoyo académico' },
            { nombre: 'Recalificación de examen', categoria: 'Evaluaciones' },
            { nombre: 'Registro extemporáneo', categoria: 'Registro' },
            { nombre: 'Reincorporación a carrera', categoria: 'Retiros y continuidad' },
            { nombre: 'Retiro de carrera', categoria: 'Retiros y continuidad' },
            { nombre: 'Retiro de materia', categoria: 'Retiros y continuidad' },
            { nombre: 'Retiro de universidad', categoria: 'Retiros y continuidad' },
            { nombre: 'Retiro extemporáneo', categoria: 'Retiros y continuidad' },
            { nombre: 'Tercer registro', categoria: 'Registro' },
        ];

        const busqueda = document.getElementById('busqueda');
        const categoria = document.getElementById('categoria');
        const tarjetas = document.getElementById('tarjetas');
        const resultado = document.getElementById('resultado');
        const vacio = document.getElementById('vacio');

        function normalizar(texto) {
            return texto
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .toLowerCase()
                .trim();
        }

        function mostrarTramites() {
            const texto = normalizar(busqueda.value);

            const filtrados = tramites.filter(tramite =>
                normalizar(tramite.nombre).includes(texto) &&
                (
                    categoria.value === '' ||
                    tramite.categoria === categoria.value
                )
            );

            tarjetas.replaceChildren();

            filtrados.forEach(tramite => {
                const tarjeta = document.createElement('article');
                tarjeta.className = 'tarjeta';

                const etiqueta = document.createElement('span');
                etiqueta.className = 'categoria';
                etiqueta.textContent = tramite.categoria;

                const titulo = document.createElement('h2');
                titulo.textContent = tramite.nombre;

                const descripcion = document.createElement('p');
                descripcion.className = 'descripcion';
                descripcion.textContent =
                    'Consulta los requisitos y documentos antes de iniciar este trámite.';

                const tieneFicha = Object.hasOwn(fichas, tramite.nombre);

                const acciones = document.createElement('div');
                acciones.className = 'acciones';

                const boton = document.createElement(
                    tieneFicha ? 'a' : 'button'
                );

                boton.textContent = 'Ver requisitos';

                if (tieneFicha) {
                    boton.href = fichas[tramite.nombre];
                    boton.className = 'enlace-ficha';
                } else {
                    boton.type = 'button';
                    boton.disabled = true;
                }

                const pendiente = document.createElement('p');
                pendiente.className = 'pendiente';
                pendiente.textContent = tieneFicha
                    ? 'Ficha disponible'
                    : 'Ficha disponible próximamente';

                acciones.append(boton, pendiente);
                tarjeta.append(etiqueta, titulo, descripcion, acciones);
                tarjetas.append(tarjeta);
            });

            resultado.textContent = filtrados.length === 1
                ? '1 trámite encontrado'
                : `${filtrados.length} trámites encontrados`;

            vacio.hidden = filtrados.length !== 0;
        }

        busqueda.addEventListener('input', mostrarTramites);
        categoria.addEventListener('change', mostrarTramites);

        mostrarTramites();
    </script>
</body>
</html>
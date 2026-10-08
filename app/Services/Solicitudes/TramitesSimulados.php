<?php

namespace App\Services\Solicitudes;

/**
 * Datos de prueba del formulario de solicitudes.
 *
 * Reemplaza temporalmente a TramiteCatalogoService (G4) y a
 * CatalogoAcademicoService (G1). Cuando esos servicios existan,
 * el controlador los usará y esta clase se podrá borrar.
 */
class TramitesSimulados
{
    private const ESTADOS_MATERIA = [
        'aprobada' => 'Aprobada',
        'reprobada' => 'Reprobada',
        'semestre_actual' => 'Semestre actual',
        'retirada' => 'Retirada',
    ];

    public function buscar(string $codigo): ?array
    {
        return $this->tramites()[$codigo] ?? null;
    }

    public function materias(): array
    {
        return [
            [
                'id' => 'calculo-demo',
                'codigo' => 'MAT202',
                'nombre' => 'Cálculo II',
                'periodo' => 'Ordinario I 2026',
                'paralelo' => 'A',
                'docente' => 'Docente de prueba A',
            ],
            [
                'id' => 'fisica-demo',
                'codigo' => 'FIS101',
                'nombre' => 'Física I',
                'periodo' => 'Ordinario I 2026',
                'paralelo' => 'B',
                'docente' => 'Docente de prueba B',
            ],
            [
                'id' => 'programacion-demo',
                'codigo' => 'COM203',
                'nombre' => 'Programación II',
                'periodo' => 'Ordinario II 2025',
                'paralelo' => 'A',
                'docente' => 'Docente de prueba C',
            ],
        ];
    }

    /**
     * Cada trámite define sus campos según la tabla 6.3 de los requerimientos.
     *
     * Tipos de campo: texto, texto_largo, numero, fecha, lista.
     * 'campos_materia' se pide por cada materia elegida.
     * 'mostrar_si' muestra el campo solo cuando otro campo tiene un valor.
     */
    private function tramites(): array
    {
        return [
            'recuperacion' => [
                'nombre' => 'examen de recuperación',
                'ficha' => 'estudiante.tramites.recuperacion',
                'instrucciones' => 'Selecciona la materia y declara tus datos académicos. '
                    .'La asistente verificará la información durante la revisión.',
                'aviso' => 'Recuperación admite una sola materia por solicitud. '
                    .'La selección y los datos declarados no representan '
                    .'una aprobación de elegibilidad.',
                'max_materias' => 1,
                'campos_materia' => [
                    [
                        'nombre' => 'estado',
                        'etiqueta' => 'Estado académico declarado',
                        'tipo' => 'lista',
                        'obligatorio' => false,
                        'opciones' => self::ESTADOS_MATERIA,
                    ],
                    [
                        'nombre' => 'nota',
                        'etiqueta' => 'Nota de la materia',
                        'tipo' => 'numero',
                        'obligatorio' => false,
                        'min' => 0,
                        'max' => 100,
                    ],
                    [
                        'nombre' => 'asistencia',
                        'etiqueta' => 'Asistencia (%)',
                        'tipo' => 'numero',
                        'obligatorio' => false,
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'campos' => [
                    [
                        'nombre' => 'gpa_periodo',
                        'etiqueta' => 'GPA del periodo',
                        'tipo' => 'numero',
                        'obligatorio' => false,
                        'min' => 0,
                        'max' => 100,
                        'ayuda' => 'Declara el GPA aplicable al periodo de la materia seleccionada.',
                    ],
                    [
                        'nombre' => 'historial_recuperacion',
                        'etiqueta' => 'Exámenes de recuperación anteriores',
                        'tipo' => 'lista',
                        'obligatorio' => false,
                        'opciones' => [
                            'nunca' => 'Nunca he rendido un examen de recuperación',
                            'con_fecha' => 'He rendido uno y conozco la fecha',
                            'fecha_desconocida' => 'He rendido uno, pero no conozco la fecha',
                            'desconocido' => 'No puedo confirmar esta información',
                        ],
                    ],
                    [
                        'nombre' => 'ultima_recuperacion',
                        'etiqueta' => 'Fecha del último examen de recuperación',
                        'tipo' => 'fecha',
                        'obligatorio' => true,
                        'mostrar_si' => ['campo' => 'historial_recuperacion', 'valor' => 'con_fecha'],
                    ],
                    [
                        'nombre' => 'observacion',
                        'etiqueta' => 'Observación',
                        'tipo' => 'texto_largo',
                        'obligatorio' => false,
                    ],
                ],
                'documentos' => [
                    [
                        'id' => 'registro-calificaciones',
                        'nombre' => 'Registro de calificaciones o evidencia de la materia reprobada',
                        'obligatorio' => true,
                    ],
                    [
                        'id' => 'otro',
                        'nombre' => 'Otro documento de apoyo',
                        'obligatorio' => false,
                    ],
                ],
            ],

            'gracia' => [
                'nombre' => 'examen de gracia',
                'ficha' => 'estudiante.tramites.gracia',
                'instrucciones' => 'Selecciona las materias y explica el motivo de tu solicitud.',
                'max_materias' => 10,
                'campos_materia' => [
                    [
                        'nombre' => 'asistencia',
                        'etiqueta' => 'Asistencia (%)',
                        'tipo' => 'numero',
                        'obligatorio' => false,
                        'min' => 0,
                        'max' => 100,
                    ],
                    [
                        'nombre' => 'nota',
                        'etiqueta' => 'Calificación actual',
                        'tipo' => 'numero',
                        'obligatorio' => false,
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'campos' => [
                    [
                        'nombre' => 'motivo',
                        'etiqueta' => 'Motivo y justificación',
                        'tipo' => 'texto_largo',
                        'obligatorio' => true,
                    ],
                ],
                'documentos' => [
                    [
                        'id' => 'respaldo',
                        'nombre' => 'Documento de respaldo (pendiente de confirmación por la facultad)',
                        'obligatorio' => false,
                    ],
                ],
            ],

            'supletorio' => [
                'nombre' => 'examen supletorio',
                'ficha' => 'estudiante.tramites.supletorio',
                'instrucciones' => 'Selecciona las materias, el parcial que no rendiste '
                    .'y la circunstancia que te impidió presentarlo.',
                'max_materias' => 10,
                'campos_materia' => [],
                'campos' => [
                    [
                        'nombre' => 'parcial',
                        'etiqueta' => 'Parcial no rendido',
                        'tipo' => 'lista',
                        'obligatorio' => true,
                        'opciones' => [
                            'primer_parcial' => 'Primer parcial',
                            'segundo_parcial' => 'Segundo parcial',
                        ],
                    ],
                    [
                        'nombre' => 'circunstancia',
                        'etiqueta' => 'Circunstancia',
                        'tipo' => 'texto_largo',
                        'obligatorio' => true,
                        'ayuda' => 'Describe qué te impidió rendir el examen.',
                    ],
                ],
                'documentos' => [
                    [
                        'id' => 'evidencia-impedimento',
                        'nombre' => 'Evidencia que respalde el impedimento para rendir el examen',
                        'obligatorio' => true,
                    ],
                ],
            ],
        ];
    }
}

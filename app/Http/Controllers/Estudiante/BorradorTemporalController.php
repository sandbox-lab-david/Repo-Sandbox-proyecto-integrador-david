<?php

namespace App\Http\Controllers\Estudiante;

use App\Http\Controllers\Controller;
use App\Services\Archivos\FirmadosTemporales;
use App\Services\Archivos\RespaldosTemporales;
use App\Services\Solicitudes\BorradoresTemporales;
use App\Services\Solicitudes\TramitesSimulados;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

/**
 * Borrador del formulario mientras la solicitud todavía no existe (RF-2.12).
 */
class BorradorTemporalController extends Controller
{
    public function __construct(
        private readonly BorradoresTemporales $borradores,
        private readonly TramitesSimulados $tramites,
        private readonly RespaldosTemporales $respaldos,
        private readonly FirmadosTemporales $firmados,
    ) {}

    public function update(Request $request, string $tramite): JsonResponse
    {
        $definicion = $this->tramites->buscar($tramite);

        abort_if($definicion === null, 404);

        // Un borrador puede estar incompleto: aquí solo se limita qué se guarda y cuánto ocupa.
        $datos = $request->validate([
            'paso' => ['required', 'integer', 'between:1,4'],
            'celular' => ['nullable', 'string', 'max:20'],
            'materias' => ['array', 'max:'.$definicion['max_materias']],
            'materias.*.id' => ['required', 'distinct', Rule::in(array_column($this->tramites->materias(), 'id'))],
            'materias.*.datos' => ['array'],
            'materias.*.datos.*' => ['nullable', 'string', 'max:2000'],
            'campos' => ['array'],
            'campos.*' => ['nullable', 'string', 'max:2000'],
            'requisitos' => ['array'],
            'requisitos.*' => ['nullable', Rule::in(array_column($definicion['documentos'], 'id'))],
        ]);

        $camposMateria = array_column($definicion['campos_materia'], 'nombre');

        $borrador = $this->borradores->guardar($tramite, [
            'paso' => (int) $datos['paso'],
            'celular' => $datos['celular'] ?? null,
            'materias' => array_map(fn (array $materia) => [
                'id' => $materia['id'],
                'datos' => Arr::only($materia['datos'] ?? [], $camposMateria),
            ], array_values($datos['materias'] ?? [])),
            'campos' => Arr::only($datos['campos'] ?? [], array_column($definicion['campos'], 'nombre')),
            // Solo de los archivos que esta sesión subió para este trámite.
            'requisitos' => Arr::only(
                $datos['requisitos'] ?? [],
                array_column($this->respaldos->delTramite($tramite), 'id')
            ),
        ]);

        return response()->json(['guardado_at' => $borrador['guardado_at']]);
    }

    public function destroy(string $tramite): Response
    {
        $this->borradores->descartar($tramite);

        // Los respaldos y el PDF firmado de ese trámite son parte del borrador.
        foreach ($this->respaldos->delTramite($tramite) as $respaldo) {
            $this->respaldos->quitar($respaldo['id']);
        }

        $this->firmados->quitar($tramite);

        return response()->noContent();
    }
}

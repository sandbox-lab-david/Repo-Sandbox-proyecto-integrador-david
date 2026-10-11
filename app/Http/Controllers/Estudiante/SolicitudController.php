<?php

namespace App\Http\Controllers\Estudiante;

use App\Http\Controllers\Controller;
use App\Services\Archivos\RespaldosTemporales;
use App\Services\Solicitudes\BorradoresTemporales;
use App\Services\Solicitudes\TramitesSimulados;
use App\Services\Solicitudes\DocumentoRecuperacion;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SolicitudController extends Controller
{
    public function documento(Request $request, TramitesSimulados $tramites, DocumentoRecuperacion $documentos)
    {
        $datos = $request->validate([
            'tramite' => 'required|in:recuperacion',
            'nombre' => 'required|string|max:150',
            'codigo' => 'required|string|max:30',
            'carrera' => 'required|string|max:150',
            'correo' => 'required|email|max:150',
            'celular' => 'required|string|max:20',
            'materia_id' => 'required|string',
        ]);
        $datos['materia'] = collect($tramites->materias())->firstWhere('id', $datos['materia_id']);
        abort_unless($datos['materia'], 422, 'Selecciona una materia del catálogo de prueba.');

        try {
            $documento = $documentos->generarWord($datos);
        } catch (\RuntimeException $error) {
            report($error);
            return response()->json(['message' => $error->getMessage()], 503);
        }

        return response($documento, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'Content-Disposition' => 'attachment; filename="solicitud-recuperacion.docx"',
            'Cache-Control' => 'private, no-store',
        ]);
    }

    public function create(
        Request $request,
        TramitesSimulados $tramites,
        RespaldosTemporales $respaldos,
        BorradoresTemporales $borradores,
    ): View {
        $codigoTramite = (string) ($request->route('tramite') ?? $request->query('tramite'));
        $tramite = $tramites->buscar($codigoTramite);

        abort_if($tramite === null, 404);

        return view('estudiante.formulario-solicitud', [
            'codigoTramite' => $codigoTramite,
            'tramite' => $tramite,
            'materias' => $tramites->materias(),
            'respaldosSubidos' => $respaldos->delTramite($codigoTramite),
            'borrador' => $borradores->buscar($codigoTramite),
        ]);
    }
}

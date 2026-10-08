<?php

namespace App\Http\Controllers\Estudiante;

use App\Http\Controllers\Controller;
use App\Services\Solicitudes\TramitesSimulados;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SolicitudController extends Controller
{
    public function create(Request $request, TramitesSimulados $tramites): View
    {
        $tramite = $tramites->buscar((string) $request->query('tramite'));

        abort_if($tramite === null, 404);

        return view('estudiante.formulario-solicitud', [
            'tramite' => $tramite,
            'materias' => $tramites->materias(),
        ]);
    }
}

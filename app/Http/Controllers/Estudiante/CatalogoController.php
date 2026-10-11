<?php

namespace App\Http\Controllers\Estudiante;

use App\Http\Controllers\Controller;
use App\Services\Solicitudes\BorradoresTemporales;
use App\Services\Solicitudes\TramitesSimulados;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CatalogoController extends Controller
{
    public function index(BorradoresTemporales $borradores, TramitesSimulados $tramites): View
    {
        $sinTerminar = [];

        foreach ($borradores->todos() as $codigo => $borrador) {
            $tramite = $tramites->buscar($codigo);

            if ($tramite !== null) {
                $sinTerminar[] = [
                    'codigo' => $codigo,
                    'nombre' => Str::ucfirst($tramite['nombre']),
                    'paso' => $borrador['paso'],
                    'guardado_at' => $borrador['guardado_at'],
                ];
            }
        }

        // El más reciente primero.
        usort($sinTerminar, fn (array $a, array $b) => strcmp($b['guardado_at'], $a['guardado_at']));

        return view('estudiante.catalogo', ['borradores' => $sinTerminar]);
    }
}

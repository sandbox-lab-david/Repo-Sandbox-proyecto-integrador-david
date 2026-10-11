<?php
namespace App\Services\Academico;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Collection;

class CatalogoAcademicoService
{
    
    //===C09: Devuelve los paralelos (cursos) activos de una materia en un periodo dado.
    public function cursosDeMateria(int $materiaId, int $periodoId): Collection
    {

    /*
    // =STUB =
    return collect([
            (object)[
                'id' => 1,
                'paralelo' => 'A10',
                'profesor' => (object)['nombres' => 'Juan', 'apellidos' => 'Pérez']
            ],
            (object)[
                'id' => 2,
                'paralelo' => 'B20',
                'profesor' => (object)['nombres' => 'María', 'apellidos' => 'Gómez']
            ]
        ]);
    */
        return Curso::with('profesor')
                    ->where('materia_id', $materiaId)
                    ->where('periodo_id', $periodoId)
                    ->get();
        
    }
}
<?php

use Illuminate\Support\Facades\Route;

Route::view('/estudiante/tramites', 'estudiante.catalogo')
    ->name('estudiante.catalogo');

Route::view(
    '/estudiante/tramites/examen-recuperacion',
    'estudiante.ficha'
)->name('estudiante.tramites.recuperacion');
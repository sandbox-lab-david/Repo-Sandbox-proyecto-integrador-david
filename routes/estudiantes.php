<?php

use Illuminate\Support\Facades\Route;

Route::view('/estudiante/tramites', 'estudiante.catalogo')
    ->name('estudiante.catalogo');

Route::view(
    '/estudiante/tramites/examen-recuperacion',
    'estudiante.recuperacion'
)->name('estudiante.tramites.recuperacion');

Route::view(
    '/estudiante/tramites/examen-gracia',
    'estudiante.gracia'
)->name('estudiante.tramites.gracia');

Route::view(
    '/estudiante/tramites/ayudante-catedra',
    'estudiante.ayudante'
)->name('estudiante.tramites.ayudante');

Route::view(
    '/estudiante/tramites/tercer-registro',
    'estudiante.tercer-registro'
)->name('estudiante.tramites.tercer-registro');

Route::view(
    '/estudiante/tramites/recalificacion-examen',
    'estudiante.recalificacion'
)->name('estudiante.tramites.recalificacion');

Route::view(
    '/estudiante/tramites/examen-supletorio',
    'estudiante.supletorio'
)->name('estudiante.tramites.supletorio');

Route::view(
    '/estudiante/tramites/homologacion',
    'estudiante.homologacion'
)->name('estudiante.tramites.homologacion');

Route::view(
    '/estudiante/solicitudes/recuperacion/nueva',
    'estudiante.formulario-recuperacion'
)->name('estudiante.solicitudes.recuperacion.crear');

Route::view(
    '/estudiante/acceso',
    'estudiante.login'
)->name('estudiante.acceso');

Route::view(
    '/estudiante/tramites/retiro-materia',
    'estudiante.retiro-materia'
)->name('estudiante.tramites.retiro-materia');

Route::view(
    '/estudiante/tramites/retiro-carrera',
    'estudiante.retiro-carrera'
)->name('estudiante.tramites.retiro-carrera');

Route::view(
    '/estudiante/tramites/retiro-universidad',
    'estudiante.retiro-universidad'
)->name('estudiante.tramites.retiro-universidad');
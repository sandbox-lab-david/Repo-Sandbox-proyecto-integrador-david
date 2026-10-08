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

Route::view(
    '/estudiante/tramites/retiro-extemporaneo',
    'estudiante.retiro-extemporaneo'
)->name('estudiante.tramites.retiro-extemporaneo');

Route::view(
    '/estudiante/tramites/cambio-carrera',
    'estudiante.cambio-carrera'
)->name('estudiante.tramites.cambio-carrera');

Route::view(
    '/estudiante/tramites/cambio-modalidad',
    'estudiante.cambio-modalidad'
)->name('estudiante.tramites.cambio-modalidad');

Route::view(
    '/estudiante/tramites/cambio-malla',
    'estudiante.cambio-malla'
)->name('estudiante.tramites.cambio-malla');

Route::view(
    '/estudiante/tramites/reincorporacion',
    'estudiante.reincorporacion'
)->name('estudiante.tramites.reincorporacion');

Route::view(
    '/estudiante/tramites/examen-suficiencia',
    'estudiante.suficiencia'
)->name('estudiante.tramites.suficiencia');

Route::view(
    '/estudiante/tramites/incompleto',
    'estudiante.incompleto'
)->name('estudiante.tramites.incompleto');

Route::view(
    '/estudiante/tramites/person-to-person',
    'estudiante.person-to-person'
)->name('estudiante.tramites.person-to-person');

Route::view(
    '/estudiante/tramites/alcance-homologacion',
    'estudiante.alcance-homologacion'
)->name('estudiante.tramites.alcance-homologacion');

Route::view(
    '/estudiante/tramites/registro-extemporaneo',
    'estudiante.registro-extemporaneo'
)->name('estudiante.tramites.registro-extemporaneo');
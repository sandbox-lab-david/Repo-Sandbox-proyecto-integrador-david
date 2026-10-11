<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DirectorCarreraController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImportacionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tramites', function () {
    return view('tramites.index');
})->name('tramites.index');

Route::get('/tramites/configurar', function () {
    return view('tramites.configurar');
});

Route::get('/tramites/plantillas', function () {
    return view('tramites.plantillas');
});

Route::get('/app', function () {
    return view('layouts.app');
});

Route::get('/periodos', function () {
    return view('administracion.periodos');
})->name('administracion.periodos');

Route::get('/materias', function () {
    return view('administracion.materias');
})->name('administracion.materias');

Route::get('/paralelos', function () {
    return view('administracion.paralelos');
})->name('administracion.paralelos');

Route::resource('cursos', CursoController::class);

Route::resource('users', UserController::class);

Route::resource('directores_carrera', DirectorCarreraController::class);

Route::resource('importaciones', ImportacionController::class)->only(['index', 'show', 'destroy']);



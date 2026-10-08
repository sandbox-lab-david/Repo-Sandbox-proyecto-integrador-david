<?php

use Illuminate\Support\Facades\Route;

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

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tramites', function () {
    return view('tramites.index');
});

Route::get('/tramites/configurar', function () {
    return view('tramites.configurar');
});

Route::get('/tramites/plantillas', function () {
    return view('tramites.plantillas');
});
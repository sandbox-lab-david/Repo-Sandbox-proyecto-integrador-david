<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administracion\PeriodoController;
use App\Http\Controllers\Administracion\MateriaController;
use App\Http\Controllers\Administracion\ParaleloController;

Route::get('/periodos', [PeriodoController::class, 'index']);
Route::get('/materias', [MateriaController::class, 'index']);
Route::get('/paralelos', [ParaleloController::class, 'index']);
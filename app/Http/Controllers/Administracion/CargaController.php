<?php

use App\Http\Controllers\Administracion\CargaController;

Route::prefix('administracion/cargas')->group(function () {
    Route::get('/', [CargaController::class, 'index'])->name('cargas.index');
    Route::post('/preview', [CargaController::class, 'preview'])->name('cargas.preview');
    Route::post('/procesar', [CargaController::class, 'procesar'])->name('cargas.procesar');
    Route::get('/historial', [CargaController::class, 'historial'])->name('cargas.historial');
    Route::get('/plantilla/{tipo}', [CargaController::class, 'descargarPlantilla'])->name('cargas.plantilla');
    Route::get('/reporte-errores/{id}', [CargaController::class, 'descargarReporteErrores'])->name('cargas.reporte-errores');
});
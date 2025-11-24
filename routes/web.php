<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReporteController;

Route::get('/', function () {
    return view('welcome');
});

//ruta pdf
Route::get('/reporte/stock', [ReporteController::class, 'imprimirStock'])->name('reporte.stock');

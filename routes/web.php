<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeportistaController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\DisciplinaController;
// Rutas para Países
Route::resource('paises', PaisController::class);

// Rutas para Disciplinas  
Route::resource('disciplinas', DisciplinaController::class);

// Rutas para Deportistas
Route::resource('deportistas', DeportistaController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [TestController::class, 'test']);

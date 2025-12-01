<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeportistaController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Session;

// Rutas para Disciplinas  
Route::resource('disciplinas', DisciplinaController::class);

// Rutas para Deportistas
Route::resource('deportistas', DeportistaController::class);

Route::resource('paises', PaisController::class);


// Rutas de login
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/registro', [AuthController::class, 'registro'])->name('registro');
Route::get('/verify', [AuthController::class, 'showVerifyForm'])->name('verify.form');
Route::post('/verify', [AuthController::class, 'verifyEmail'])->name('verify.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// RUTAS para visitantes (solo lectura) - USAN LAS VISTAS index2
Route::get('/visitante/deportistas', function() {
    if (!Session::has('usuario_id')) {
        return redirect()->route('login');
    }
    $deportistas = \App\Models\Deportista::with(['pais', 'disciplina'])->get();
    return view('deportistas.index2', compact('deportistas')); // Vista index2
})->name('deportistas.index2');

Route::get('/visitante/disciplinas', function() {
    if (!Session::has('usuario_id')) {
        return redirect()->route('login');
    }
    $disciplinas = \App\Models\Disciplina::all();
    return view('disciplinas.index2', compact('disciplinas')); // Vista index2
})->name('disciplinas.index2');

Route::get('/visitante/paises', function() {
    if (!Session::has('usuario_id')) {
        return redirect()->route('login');
    }
    $paises = \App\Models\Pais::all();
    return view('paises.index2', compact('paises')); // Vista index2
})->name('paises.index2');


// Ruta por defecto - muestra el login
Route::get('/', function () {
    return redirect()->route('login');  // Cambia esto
});


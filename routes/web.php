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

// Rutas de login
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/registro', [AuthController::class, 'registro'])->name('registro');
Route::get('/verify', [AuthController::class, 'showVerifyForm'])->name('verify.form');
Route::post('/verify', [AuthController::class, 'verifyEmail'])->name('verify.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Ruta para visitantes
Route::get('/visitante/menu', function() {
    if (!Session::has('usuario_id')) {
        return redirect()->route('login');
    }
    return view('visitante.menu');
})->name('visitante.menu');

Route::get('/', function () {
    return view('welcome');
});
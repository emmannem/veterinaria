<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\HistorialController;

// Ruta para la página de inicio
Route::get('/', [MascotaController::class, 'index'])->name('home');

// Rutas de recursos para 'mascotas' (CRUD)
Route::resource('mascotas', MascotaController::class);
Route::resource('servicios', ServicioController::class);
Route::resource('citas', CitaController::class);
Route::resource('historiales', HistorialController::class);

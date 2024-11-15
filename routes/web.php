<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ServicioController;
use App\Models\Servicio;

// Ruta para la página de inicio
Route::get('/', [MascotaController::class, 'index'])->name('home');

// Rutas de recursos para 'mascotas' (CRUD)
Route::resource('mascotas', MascotaController::class);
Route::resource('servicios', ServicioController::class);

// Otras vistas
Route::get('/servicios', [ServicioController::class, 'index'])->name('servicios.index');
Route::view('/citas', 'citas.index')->name('citas.index');

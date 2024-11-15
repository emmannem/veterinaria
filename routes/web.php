<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;

// Ruta para la página de inicio
Route::get('/', [MascotaController::class, 'index'])->name('home');

// Rutas de recursos para 'mascotas' (CRUD)
Route::resource('mascotas', MascotaController::class);

// Otras vistas
Route::view('/servicios', 'servicios.index')->name('servicios.index');
Route::view('/citas', 'citas.index')->name('citas.index');

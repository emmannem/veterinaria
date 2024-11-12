<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'mascotas.index')->name('home');
Route::view('/mascotas', 'mascotas.index')->name('mascotas.index');
Route::view('/servicios', 'servicios.index')->name('servicios.index');
Route::view('/citas', 'citas.index')->name('citas.index');

// Rutas para crear nuevas entradas

Route::view('/servicios/create', 'servicios.create')->name('servicios.create');
Route::view('/citas/create', 'citas.create')->name('citas.create');

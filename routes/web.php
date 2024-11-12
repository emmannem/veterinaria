<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'mascotas.index')->name('home');
Route::view('/mascotas', 'mascotas.index')->name('mascotas.index');
Route::view('/servicios', 'servicios.index')->name('servicios.index');
Route::view('/citas', 'citas.index')->name('citas.index');

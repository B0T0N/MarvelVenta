<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;

Route::get('/register', [RegisterController::class, 'create'])
    ->name('register.index');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

Route::get('/login', [SessionsController::class, 'create'])
    ->name('login.index');

Route::post('/login', [SessionsController::class, 'store'])
    ->name('login.store');

Route::get('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');

Route::resource('admin',AdminController::class)->middleware('auth.admin');
Route::resource('categorias',App\Http\Controllers\CategoriaController::class)->middleware('auth.admin');
Route::resource('productos',App\Http\Controllers\ProductoController::class)->middleware('auth');
Route::resource('vistas',App\Http\Controllers\VistaController::class);
Route::resource('comentarios',App\Http\Controllers\CompraController::class);

Route::get('/home', [App\Http\Controllers\VistaController::class, 'index'])->name('home');






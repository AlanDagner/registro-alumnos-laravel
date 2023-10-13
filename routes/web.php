<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AlumnoController;


Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('auth')
    ->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');
Route::get('/login', [SessionsController::class, 'create'])
    ->middleware('guest')
    ->name('login.index');
Route::post('/login', [SessionsController::class, 'store'])
    ->name('login.store');
Route::get('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');

Route::get('/', [AlumnoController::class, 'index'])
    ->name('alumnos.index');

Route::resource('/alumnos', AlumnoController::class);

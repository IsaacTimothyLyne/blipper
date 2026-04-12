<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\ChirpController::class, 'index'])->name('home');


Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login.form');

Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register.form');


// Chirping
Route::resource('chirps', App\Http\Controllers\ChirpController::class)->only(['index', 'store', 'destroy', 'update']);

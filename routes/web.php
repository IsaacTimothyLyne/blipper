<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\BlipController::class, 'index'])->name('home');


Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login.form');

Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register.form');

Route::post('/signOut', [App\Http\Controllers\Auth\SignOutController::class, 'signOut'])->name('signOut');


// Blips
Route::resource('blips', App\Http\Controllers\BlipController::class)->only(['index', 'store', 'destroy', 'update']);

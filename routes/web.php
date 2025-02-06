<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\LandingController;
use App\Http\Controllers\UserController;

Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/register', [UserController::class, 'register'])->name('user.register');
Route::get('/login', [UserController::class, 'login'])->name('user.login');

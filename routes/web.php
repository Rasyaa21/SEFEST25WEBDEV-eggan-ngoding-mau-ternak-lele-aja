<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\LandingController;
use App\Http\Controllers\PondController;
use App\Http\Controllers\RekomChatController;
use App\Http\Controllers\TanyaKolamController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthSession;

Route::middleware(['web'])->group(function () {
    Route::get('/', [LandingController::class, 'index'])->name('home');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
    
    Route::get('/kolam-cerdas', [RekomChatController::class, 'index'])->name('page.kolam.cerdas');
    Route::get('/tanya-kolam', [TanyaKolamController::class, 'index'])->name('page.tanya.kolam');

    Route::get('/register', [UserController::class, 'register'])->name('user.register');
    Route::get('/login', [UserController::class, 'login'])->name('user.login');
    Route::post('/login', [UserController::class, 'loginLogic'])->name('login.store');
    
    Route::middleware([AuthSession::class])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/pantau-kolam', [PondController::class, 'index'])->name('pantau.kolam');
        Route::post('/pantau-kolam', [PondController::class, 'store'])->name('pantau.kolam.store');
        Route::put('/pond/{id}', [PondController::class, 'update'])->name('pantau.kolam.update');
        Route::get('/pond/{id}', [PondController::class, 'show'])->name('pantau.kolam.show');
        Route::delete('/pond/{id}', [PondController::class, 'destroy'])->name('pantau.kolam.destroy');

    });
});
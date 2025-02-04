<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\LandingController;

Route::get('/', [LandingController::class, 'index']);

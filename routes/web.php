<?php

use App\Http\Controllers\AcademyTransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\LandingController;
use App\Http\Controllers\RekomChatController;
use App\Http\Controllers\TanyaKolamController;
use App\Http\Controllers\MarketplaceTransactionController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\UserController;
use App\Models\AcademyTransaction;
use App\Models\MarketplaceTransaction;
use App\Models\TransactionDetail;
use Illuminate\Database\Events\TransactionBeginning;

Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/register', [UserController::class, 'register'])->name('user.register');
Route::get('/login', [UserController::class, 'login'])->name('user.login');

Route::get('/kolam-cerdas', [RekomChatController::class, 'index'])->name('page.kolam.cerdas');
Route::get('/tanya-kolam', [TanyaKolamController::class, 'index'])->name('page.tanya.kolam');
Route::get('/marketplace', [MarketplaceTransactionController::class, 'index'])->name('page.marketplace');
Route::any('/checkout', [CheckoutController::class, 'index'])->name('page.checkout');
Route::get('/product/{id}', [ProductController::class, 'index'])->name('page.product');
Route::get('/academy', [AcademyTransactionController::class, 'index'])->name('page.academy');
Route::get('/order/{id}', [TransactionDetailController::class, 'viewOrder'])->name('page.order');
Route::post('/createInvoice', [TransactionDetailController::class, 'create'])->name('page.invoice.create');
Route::post('/midtrans/callback', [TransactionDetailController::class, 'callback'])->name('page.invoice.create');
// Route::post();
Route::get('/test', [RekomChatController::class, 'testChatbot'])->name('test.chatbot');

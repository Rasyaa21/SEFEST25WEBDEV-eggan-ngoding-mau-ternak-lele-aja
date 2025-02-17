<?php
use App\Http\Controllers\AcademyTransactionController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\frontend\LandingController;
use App\Http\Controllers\MarketplaceTransactionController;
use App\Http\Controllers\PondController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RekomChatController;
use App\Http\Controllers\TanyaKolamController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthSession;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {
    Route::get('/', [LandingController::class, 'index'])->name('home');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');

    Route::get('/kolam-cerdas', [RekomChatController::class, 'index'])->name('page.kolam.cerdas');
    Route::get('/tanya-kolam', [TanyaKolamController::class, 'index'])->name('page.tanya.kolam');
  
    Route::get('/marketplace', [MarketplaceTransactionController::class, 'index'])->name('page.marketplace');
    Route::any('/checkout', [CheckoutController::class, 'index'])->name('page.checkout');
    Route::get('/product/{id}', [ProductController::class, 'index'])->name('page.product');
    Route::get('/academy', [AcademyTransactionController::class, 'index'])->name('page.academy');
    Route::get('/order/{id}', [TransactionDetailController::class, 'viewOrder'])->name('page.order');
    Route::get('/test', [RekomChatController::class, 'testChatbot'])->name('test.chatbot');
    Route::get('/register', [UserController::class, 'register'])->name('user.register');
    Route::get('/login', [UserController::class, 'login'])->name('user.login');
    Route::post('/login', [UserController::class, 'loginLogic'])->name('login.store');
    Route::post('/createInvoice', [TransactionDetailController::class, 'create'])->name('page.invoice.create');

    Route::middleware([AuthSession::class])->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

            Route::get('/pantau-kolam', [PondController::class, 'index'])->name('pantau.kolam');
            Route::post('/pantau-kolam', [PondController::class, 'store'])->name('pantau.kolam.store');
            Route::put('/pond/{id}', [PondController::class, 'update'])->name('pantau.kolam.update');
            Route::get('/pond/{id}', [PondController::class, 'show'])->name('pantau.kolam.show');
            Route::delete('/pond/{id}', [PondController::class, 'destroy'])->name('pantau.kolam.destroy');

            Route::get('/transactions', [DashboardController::class, 'transactionHistory'])->name('transaction.history');
            Route::get('/academy', [DashboardController::class, 'academy'])->name('academy.page');
            Route::get('/academy/{id}', [DashboardController::class, 'academyview'])->name('academy.view');

            Route::get('product/{id}/checkout', [CheckoutController::class, 'index'])->name('product.checkout');
        });
    });
});


<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PaymentController;

use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/login', function () {
    return view('auth.login');
});



Route::middleware(['auth', 'verified'])->group(function () {
    // Route for admin dashboard
    Route::get('/admin/dashboard', function () {
        $user = auth()->user();
        return view('admin.dashboard')->with('user', $user);
    })->name('admin.dashboard');

    // Route for customer dashboard
    Route::get('/customer/dashboard', function () {
        $user = auth()->user();
        return view('customer.dashboard')->with('user', $user);
    })->name('customer.dashboard');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});
Route::get('/admin/products', [ProductController::class, 'indexForAdmin'])->name('admin.products.index');

Route::middleware('auth')->group(function () {
    Route::resource('orders', 'App\Http\Controllers\OrderController');
    Route::resource('reservations', 'App\Http\Controllers\ReservationController');
    Route::resource('tables', 'App\Http\Controllers\TableController');
    Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/payment/create', [PaymentController::class, 'create'])->name('payment.create');
    Route::get('/payment/create', [PaymentController::class, 'showPayment'])->name('payment.create');

});






Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
require __DIR__ . '/auth.php';
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

use app\Http\Controllers\ProductController;

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
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::middleware(['auth', 'verified'])->group(function () {
    // Route for admin dashboard
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Route for customer dashboard
    Route::get('/customer/dashboard', function () {
        return view('customer.dashboard');
    })->name('customer.dashboard');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Route for product index
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');

    // Route for showing a specific product
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

    // Route for creating a product
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

    // Route for storing a new product
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');

    // Route for editing a product
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

    // Route for updating a product
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

    // Route for deleting a product
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});



Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
require __DIR__ . '/auth.php';
Route::post('/register', [RegisteredUserController::class, 'register'])->name('register');

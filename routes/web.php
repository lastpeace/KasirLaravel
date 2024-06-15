<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReservationController;
use App\Models\Reservation;
use App\Http\Controllers\TableController;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

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
Route::view('/', 'dashboard')->name('dashboard');
Route::view('/login', 'auth.login');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/dashboard', function () {
        $user = auth()->user();
        $totalOrders = Order::count();
        $trendingProducts = Product::select('products.*', DB::raw('COUNT(orders.id) as order_count'))
            ->leftJoin('orders', 'products.id', '=', 'orders.product_id')
            ->groupBy('products.id')
            ->orderByDesc('order_count')
            ->take(3)
            ->get();
        $dailyOrdersData = Order::all();

        return view('admin.dashboard', compact('user', 'totalOrders', 'trendingProducts', 'dailyOrdersData'));
    })->name('admin.dashboard');

    Route::get('/customer/dashboard', function () {
        $user = auth()->user();
        return view('customer.dashboard', compact('user'));
    })->name('customer.dashboard');
});

Route::middleware(['auth'])->group(function () {

    Route::resource('products', ProductController::class);
    Route::get('/admin/products', [ProductController::class, 'indexForAdmin'])->name('admin.products.index');

    Route::resource('reservations', ReservationController::class);
    Route::get('/admin/reservations', [ReservationController::class, 'indexForAdmin'])->name('admin.reservations.index');

    Route::resource('orders', OrderController::class);

    Route::resource('tables', TableController::class);

    Route::resource('payments', PaymentController::class);

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

require __DIR__ . '/auth.php';

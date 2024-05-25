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
        $orders = Order::all();
        $orderCounts = $orders->groupBy(function ($order) {
            return $order->created_at->format('Y-m-d');
        })->map->count();
        $totalOrders = $orders->count();
        $trendingProducts = Product::select('products.*', DB::raw('COUNT(orders.id) as order_count'))
            ->leftJoin('orders', 'products.id', '=', 'orders.product_id')
            ->groupBy('products.id')
            ->orderByDesc('order_count')
            ->take(3) // Adjust the number of products you want to display
            ->get();
        return view('admin.dashboard', compact('user', 'totalOrders', 'trendingProducts'));
    })->name('admin.dashboard');

    // Route for customer dashboard
    Route::get('/customer/dashboard', function () {
        $user = auth()->user();
        return view('customer.dashboard')->with('user', $user);
    })->name('customer.dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});


Route::get('/admin/products', [ProductController::class, 'indexForAdmin'])->name('admin.products.index');
Route::get('/admin/reservations', [ReservationController::class, 'indexForAdmin'])->name('admin.reservations.index');


Route::middleware('auth')->group(function () {
    Route::resource('orders', 'App\Http\Controllers\OrderController');

    Route::resource('reservations', 'App\Http\Controllers\ReservationController');
    Route::resource('tables', 'App\Http\Controllers\TableController');

});

Route::middleware('auth')->group(function () {
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('/payments/create/{reservationId}', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/payments/store/{reservationId}', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/payments/{payment}', [PaymentController::class, 'show'])->name('payments.show');
    Route::get('/payments/{payment}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
    Route::put('/payments/{payment}', [PaymentController::class, 'update'])->name('payments.update');
    Route::delete('/payments/{payment}', [PaymentController::class, 'destroy'])->name('payments.destroy');
    Route::get('/payments/create/{reservationId}', [PaymentController::class, 'createPayment'])->name('payments.create');
    Route::post('/payments/store/{reservationId}', [PaymentController::class, 'storePayment'])->name('payments.store');

});




Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
require __DIR__ . '/auth.php';
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

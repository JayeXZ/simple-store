<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;

// Home
Route::get('/', function () {
    return view('welcome');
});

// Dashboard redirect based on role
Route::middleware('auth')->get('/dashboard', function () {
    if (Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('products.index');
})->name('dashboard');


// =========================
// ADMIN ROUTES
// =========================
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Categories CRUD
    Route::resource('categories', CategoryController::class);

    // Products CRUD (admin)
    Route::resource('products', AdminProductController::class);

    // Orders (admin)
    Route::get('/orders', [AdminOrderController::class, 'index'])
        ->name('orders.index');
    Route::get('/orders/{order}', [AdminOrderController::class, 'show'])
        ->name('orders.show');
    Route::patch('/orders/{order}', [AdminOrderController::class, 'update'])
        ->name('orders.update');
});


// =========================
// PUBLIC PRODUCT ROUTES
// =========================
Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.show');


// =========================
// AUTHENTICATED USER ROUTES
// =========================
Route::middleware('auth')->group(function () {
    // Checkout routes
Route::get('/checkout', [CheckoutController::class, 'index'])
 ->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])
 ->name('checkout.store');
Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])
 ->name('checkout.success');


    // Cart
    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/cart/add/{product}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::patch('/cart/update/{productId}', [CartController::class, 'update'])
        ->name('cart.update');

    Route::delete('/cart/remove/{productId}', [CartController::class, 'remove'])
        ->name('cart.remove');

    Route::delete('/cart/clear', [CartController::class, 'clear'])
        ->name('cart.clear');

    // Orders (user)
    Route::get('/orders', [OrderController::class, 'index'])
        ->name('orders.index');

    Route::get('/orders/{order}', [OrderController::class, 'show'])
        ->name('orders.show');
});
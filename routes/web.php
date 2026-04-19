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
 
Route::middleware('auth')->group(function () { 
    // Dashboard redirect based on role 
    Route::get('/dashboard', function () { 
        if (Auth::user()->role === 'admin') { 
            return redirect()->route('admin.dashboard'); 
        } 
        return redirect()->route('products.index'); 
    })->name('dashboard'); 
 
    // ... rest of your auth routes 
}); 
 
 

Route::middleware(['auth', 'admin']) 
    ->prefix('admin') 
    ->name('admin.') 
    ->group(function () { 
 
    Route::get('/dashboard', [DashboardController::class, 'index']) 
        ->name('dashboard'); 
// Categories - full resource CRUD
Route::resource('categories', CategoryController::class);
// Products - full resource CRUD
Route::resource('products', AdminProductController::class);
// Orders - view and update status only
Route::get('/orders', [AdminOrderController::class, 'index'])
->name('orders.index');
Route::get('/orders/{order}', [AdminOrderController::class, 'show'])
->name('orders.show');
Route::patch('/orders/{order}', [AdminOrderController::class, 'update'])
->name('orders.update');
        
 // Public product routes - no login needed
Route::get('/products', [ProductController::class, 'index'])
 ->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])
 ->name('products.show');
// Authenticated customer routes
Route::middleware('auth')->group(function () {
 // Cart routes
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
 // Order history routes
 Route::get('/orders', [OrderController::class, 'index'])
 ->name('orders.index');
 Route::get('/orders/{order}', [OrderController::class, 'show'])
 ->name('orders.show');
});
    // More admin routes will be added in future modules 
}); 

Route::get('/', function () {
    return view('welcome');
});
// Public product routes - no login needed 
Route::get('/products', [ProductController::class, 'index']) 
    ->name('products.index'); 
Route::get('/products/{product}', [ProductController::class, 'show']) 
    ->name('products.show'); 
 
// Authenticated customer routes 
Route::middleware('auth')->group(function () { 
 
    // Cart routes 
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
 
    // Order history routes 
    Route::get('/orders', [OrderController::class, 'index']) 
        ->name('orders.index'); 
    Route::get('/orders/{order}', [OrderController::class, 'show']) 
        ->name('orders.show'); 
});

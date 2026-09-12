<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
 
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
        
 
    // More admin routes will be added in future modules 
}); 

Route::get('/', function () {
    return view('welcome');
});

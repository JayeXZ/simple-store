<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 
 
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
 
    // More admin routes will be added in future modules 
}); 
Route::get('/', function () {
    return view('welcome');
});

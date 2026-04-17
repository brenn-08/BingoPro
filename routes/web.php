<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BingoCardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController; // 🔥 FIX ADDED
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Bingo Cards - Player/Host/Admin
    Route::resource('bingo-cards', BingoCardController::class)
        ->middleware(['auth']);

    // Admin only routes
    Route::middleware('role:admin')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {
            Route::resource('users', UserController::class)
                ->except(['create', 'store']);
        });
});

require __DIR__.'/auth.php';
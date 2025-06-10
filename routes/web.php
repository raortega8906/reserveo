<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas reservas:
Route::middleware('role:admin')->group(function () {
    Route::prefix('admin')->group(function () {

        Route::get('/reservations', [ReservationController::class, 'index'])->name('admin.reservations.index');
        Route::get('/reservations/create', [ReservationController::class, 'create'])->name('admin.reservations.create');
        Route::post('/reservation', [ReservationController::class, 'store'])->name('admin.reservations.store');
        Route::get('/reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('admin.reservations.edit');
        Route::put('/reservations/{reservation}', [ReservationController::class, 'update'])->name('admin.reservations.update');
    
    });
});

require __DIR__.'/auth.php';

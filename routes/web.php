<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

// Landing:
Route::get('/', function () {
    return view('welcome');
});

// Dashboard:
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        // Si el usuario es cliente, redirigir al calendario
        if (auth()->user()->role == 'client') {
            return redirect()->route('calendar');
        }
        
        // Si es admin u otro rol, mostrar el dashboard normal
        return app(ReservationController::class)->allReservations();
    })->name('dashboard');
});

// Rutas calendario: 
Route::get('/calendar', [ReservationController::class, 'calendar'])->name('calendar');

// Rutas reservas cliente:
Route::get('/reservations/create', [ReservationController::class, 'createClient'])->name('reservations.create');
Route::post('/calendar', [ReservationController::class, 'storeClient'])->name('reservations.store');

// Perfil:
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('role:admin')->group(function () {

    Route::prefix('admin')->group(function () {

        // Rutas reservas:
        Route::get('/reservations', [ReservationController::class, 'index'])->name('admin.reservations.index');
        Route::get('/reservations/create', [ReservationController::class, 'create'])->name('admin.reservations.create');
        Route::post('/reservations', [ReservationController::class, 'store'])->name('admin.reservations.store');
        Route::get('/reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('admin.reservations.edit');
        Route::put('/reservations/{reservation}', [ReservationController::class, 'update'])->name('admin.reservations.update');
        Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('admin.reservations.destroy');
    
        // Rutas servicios:
        Route::get('/services', [ServiceController::class, 'index'])->name('admin.services.index');
        Route::get('/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
        Route::post('/services', [ServiceController::class, 'store'])->name('admin.services.store');
        Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
        Route::put('/services/{service}', [ServiceController::class, 'update'])->name('admin.services.update');
        Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');

    });
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\beasiswaController;
use App\Http\Controllers\pengajuanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('komponent.main');
});

Route::get('index', function () {
    return view('komponent.main');
});

// Authentication Routes (Breeze)
require __DIR__ . '/auth.php';

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin routes
    Route::middleware('role:admin')->group(function () {
        // Admin specific routes
    });

    // Pendaftar routes
    Route::middleware('role:pendaftar')->group(function () {
        Route::resource('pendaftar', PendaftarController::class);
        Route::resource('pengajuan', pengajuanController::class);
        Route::get('/userpengajuan', [pengajuanController::class, 'index'])->name('userpengajuan');
    });

    // Penyedia routes
    Route::middleware('role:penyedia')->group(function () {
        Route::resource('beasiswa', beasiswaController::class);
    });
});

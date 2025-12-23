<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\beasiswaController;

Route::get('/', function () {
    return view('komponent.main');
});

Route::get('index', function () {
    return view('komponent.main');
});


Route::resource('pendaftar', PendaftarController::class);
Route::resource('beasiswa', beasiswaController::class);

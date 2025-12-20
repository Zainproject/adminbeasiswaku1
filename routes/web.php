<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftarController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', function () {
    return view('komponent.main');
});

Route::resource('pendaftar', PendaftarController::class);

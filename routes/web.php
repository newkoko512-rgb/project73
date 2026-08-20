<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\WardController;

Route::get('/wards', [WardController::class, 'index'])->name('wards.index');
Route::get('/wards/{id}', [WardController::class, 'show'])->name('wards.show');

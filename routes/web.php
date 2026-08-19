<?php

use App\Http\Controllers\AllocationController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StaffSearchController;
use App\Http\Controllers\WardReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('staff.index'));

Route::resource('staff', StaffController::class)->except(['show']);
Route::get('staff/search', [StaffSearchController::class, 'search'])->name('staff.search');

Route::resource('allocations', AllocationController::class)->only(['index', 'store', 'destroy']);

Route::get('wards/report', [WardReportController::class, 'show'])->name('wards.report');

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Donator\DashboardDonatorController;
use App\Http\Controllers\Penerima\DashboardPenerimaController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

// ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardAdminController::class, 'index']);
});

// DONATOR
Route::middleware(['auth', 'role:donator'])->group(function () {
    Route::get('/donator/dashboard', [DashboardDonatorController::class, 'index']);
});

// PENERIMA
Route::middleware(['auth', 'role:penerima'])->group(function () {
    Route::get('/penerima/dashboard', [DashboardPenerimaController::class, 'index']);
});

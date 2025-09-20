<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminRoomController;
use App\Http\Controllers\AdminReservationController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Halaman dashboard untuk user biasa
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Halaman admin
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/rooms', [AdminController::class, 'rooms'])->name('admin.rooms');
    Route::get('/reservations', [AdminController::class, 'reservations'])->name('admin.reservations');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('users', AdminUserController::class)->names([
        'index' => 'admin.users',
        'store' => 'admin.users.store',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('rooms', AdminRoomController::class)->names([
        'index' => 'admin.rooms',
        'store' => 'admin.rooms.store',
        'update' => 'admin.rooms.update',
        'destroy' => 'admin.rooms.destroy',
    ]);
});



Route::middleware(['auth'])->group(function () {
   // Di routes/web.php
Route::post('/book-room', [UserReservationController::class, 'store'])->name('user.bookRoom')->middleware('auth');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
});




Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('reservations', AdminReservationController::class)->names([
        'index' => 'admin.reservations',
        'store' => 'admin.reservations.store',
        'update' => 'admin.reservations.update',
        'destroy' => 'admin.reservations.destroy',
    ]);
});




// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

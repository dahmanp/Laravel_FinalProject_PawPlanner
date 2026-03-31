<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    // Dummy routes for Users and Reports (replace with real controllers later)
    Route::get('/users', function() { return 'Users list'; })->name('users.index');
    Route::get('/users/create', function() { return 'Add user form'; })->name('users.create');
    Route::get('/reports', function() { return 'Reports page'; })->name('reports.index');
});

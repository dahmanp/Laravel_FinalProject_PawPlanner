<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'create']);
Route::post('/register', [AuthController::class, 'store']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/tasks', [App\Http\Controllers\DashboardController::class, 'index'])->name('task.list');
    // TESTING-----> Route::get('/tasks', function() { return 'Tasks'; })->name('tasks');
    //Route::get('/calendar', [App\Http\Controllers\DashboardController::class, 'index'])->name('tasks');
    //Route::get('/pets', [App\Http\Controllers\DashboardController::class, 'index'])->name('pets');

    // Dummy routes for Users and Reports (replace with real controllers later)
    Route::get('/users', function() { return 'Users list'; })->name('users.index');
    Route::get('/users/create', function() { return 'Add user form'; })->name('users.create');
    Route::get('/reports', function() { return 'Reports page'; })->name('reports.index');

    Route::get('/createpet', [PetController::class, 'create']);
    Route::post('/createpet', [PetController::class, 'store']);
    Route::get('/createtask', [TaskController::class, 'create']);
    Route::post('/createtask', [TaskController::class, 'store']);
});

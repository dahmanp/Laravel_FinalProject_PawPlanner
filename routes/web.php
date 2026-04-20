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
    Route::get('/profile', [AuthController::class, 'showProfile'])->name('show.profile');
    Route::get('/profile/edit', [AuthController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/edit', [AuthController::class, 'update'])->name('profile.update');
    Route::delete('/delete', [AuthController::class, 'destroy'])->name('users.destroy');

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/tasks', [TaskController::class, 'index'])->name('task.list');
    Route::put('/tasks/{task}', [TaskController::class, 'update']);
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('updatetask');
    Route::get('/pets', [PetController::class, 'index'])->name('pet.list');
    Route::get('/petpage/{pet}', [PetController::class, 'show'])->name('petpage');
    Route::get('/pets/{pet}/edit', [PetController::class, 'edit'])->name('updatepet');
    Route::put('/pets/{pet}', [PetController::class, 'update']);
    Route::get('/share/{pet}', [PetController::class, 'share'])->name('sharepet');
    Route::post('/sharepet', [PetController::class, 'storeShare']);
    Route::get('/createpet', [PetController::class, 'create'])->name('createpet');
    Route::post('/createpet', [PetController::class, 'store']);
    Route::get('/createtask', [TaskController::class, 'create'])->name('createtask');
    Route::post('/createtask', [TaskController::class, 'store']);
    //edit below
    Route::get('/network', [TaskController::class, 'create'])->name('mynetwork');
});

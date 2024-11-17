<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::controller(TaskController::class)->middleware('auth')->name('tasks')->group(function () {
    Route::get('/tasks', 'index')->name('.index');
    Route::get('/tasks/create', 'create')->name('.create');
    Route::post('/tasks', 'store')->name('.store');
    Route::get('/tasks/{task}', 'show')->name('.show');
    Route::get('/tasks/{task}/edit', 'edit')->name('.edit');
    Route::put('/tasks/{task}', 'update')->name('.update');
    Route::delete('/tasks/{task}', 'destroy')->name('.destroy');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/userTasks/{user_id}', [AdminController::class, 'userTasks'])->middleware(['auth', 'verified'])->name('dashboard.userTasks');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

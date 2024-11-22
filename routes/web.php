<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\LikedShowController;
Route::get('/', function () {
    return view('/welcome');
});

// Actualiza la ruta del dashboard para usar el controlador MovieController
Route::get('/dashboard', [MovieController::class, 'search'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/equipo', [TeamController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::post('/like-show', [LikedShowController::class, 'toggle'])->name('like.show');
require __DIR__.'/auth.php';

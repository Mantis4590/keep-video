<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VideoController;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegisterController::class, 'show'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [VideoController::class, 'index'])->name('home');
    Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.create');
    Route::post('/videos', [VideoController::class, 'store'])->name('videos.store');
    Route::get('/videos/{id}/edit', [VideoController::class, 'edit'])->name('videos.edit');
    Route::delete('/videos/{id}', [VideoController::class, 'destroy'])->name('videos.destroy');
    Route::put('/videos/{id}', [VideoController::class, 'update'])->name('videos.update');
    Route::get('/videos/{id}', [VideoController::class, 'show'])->name('videos.show');
});
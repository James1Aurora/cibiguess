<?php

use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;
// CONTROLLER
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'index']);

Route::middleware([AuthMiddleware::class])->prefix('/ds')->group(function () {
    Route::get('/game', [GameController::class, 'index']);

    Route::get('/badge', [BadgeController::class, 'index'])->name('badge');
    Route::post('/badge', [BadgeController::class, 'store'])->name('badge.store');
    Route::post('/badge/{id}', [BadgeController::class, 'update'])->name('badge.update');
    Route::delete('/badge/{id}', [BadgeController::class, 'destroy'])->name('badge.delete');
});


// RESTful API
// Route::resource('users', 'UserController');
// GET /users: Menampilkan daftar semua pengguna.
// GET /users/create: Menampilkan formulir untuk membuat pengguna baru.
// POST /users: Menyimpan data pengguna baru ke basis data.
// GET /users/{id}: Menampilkan detail pengguna dengan ID tertentu.
// GET /users/{id}/edit: Menampilkan formulir untuk mengedit pengguna dengan ID tertentu.
// PUT /users/{id}: Memperbarui data pengguna dengan ID tertentu.
// DELETE /users/{id}: Menghapus pengguna dengan ID tertentu.

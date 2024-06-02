<?php

use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;
// CONTROLLER
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashUsersController;

// MAIN ROUTE
Route::get('/', [MainController::class, 'index'])->name('home');

// AUTH
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');

// PLAY GAME
Route::get('/main-menu', [GameController::class, 'index'])->name('game.menu');
Route::get('/play-game', [GameController::class, 'gameStart'])->name('game.play');

Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
Route::get('/leaderboard', [MainController::class, 'leaderboard'])->name('leaderboard');
Route::get('/donate', [MainController::class, 'donate'])->name('donate');
Route::get('/reviews', [ReviewController::class, 'index'])->name('review');
Route::get('/review/create', [ReviewController::class, 'create'])->name('review.create');

Route::middleware([AuthMiddleware::class])->prefix('/ds')->group(function () {
    Route::get('/game', [GameController::class, 'index']);

    Route::get('/badge', [BadgeController::class, 'index'])->name('badge');
    Route::post('/badge', [BadgeController::class, 'store'])->name('badge.store');
    Route::post('/badge/{id}', [BadgeController::class, 'update'])->name('badge.update');
    Route::delete('/badge/{id}', [BadgeController::class, 'destroy'])->name('badge.delete');
});

// DASHBOARD USER
Route::get('/users',[DashUsersController::class,'loadAllUsers']);
Route::get('/add-user',[DashUsersController::class,'loadAddUserForm']);

Route::post('/add-user',[DashUsersController::class,'AddUser'])->name('AddUser');

Route::get('/edit-user{id}',[DashUsersController::class,'loadEditForm']);
Route::get('/delete/{id}',[DashUsersController::class,'deleteUser']);

Route::post('/edit-user',[DashUsersController::class,'EditUser'])->name('EditUser');



// RESTful API
// Route::resource('users', 'UserController');
// GET /users: Menampilkan daftar semua pengguna.
// GET /users/create: Menampilkan formulir untuk membuat pengguna baru.
// POST /users: Menyimpan data pengguna baru ke basis data.
// GET /users/{id}: Menampilkan detail pengguna dengan ID tertentu.
// GET /users/{id}/edit: Menampilkan formulir untuk mengedit pengguna dengan ID tertentu.
// PUT /users/{id}: Memperbarui data pengguna dengan ID tertentu.
// DELETE /users/{id}: Menghapus pengguna dengan ID tertentu.

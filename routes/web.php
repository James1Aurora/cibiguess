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
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashUsersController;
use App\Http\Controllers\MapController;

// MAIN ROUTE
Route::get('/', [MainController::class, 'index'])->name('home');

// AUTH
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');

// PLAY GAME
Route::get('/main-menu', [GameController::class, 'index'])->name('game.menu');
Route::get('/game/start', [GameController::class, 'gameStart'])->name('game.start');
Route::post('/game/save-answer', [GameController::class, 'saveAnswer'])->name('game.saveAnswer');
Route::get('/game/next-question', [GameController::class, 'nextQuestion'])->name('game.nextQuestion');
Route::get('/game/result', [GameController::class, 'result'])->name('game.result');


Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
Route::get('/leaderboard', [MainController::class, 'leaderboard'])->name('leaderboard');
Route::get('/donate', [MainController::class, 'donate'])->name('donate');
Route::get('/reviews', [ReviewController::class, 'index'])->name('review');
Route::get('/review/create', [ReviewController::class, 'create'])->name('review.create');

Route::middleware([AuthMiddleware::class])->prefix('/ds')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

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
Route::post('/edit-user',[DashUsersController::class,'EditUser'])->name('EditUser');
Route::get('/delete/{id}',[DashUsersController::class,'deleteUser']);


//DASHBOARD MAPS
// Route untuk menampilkan semua peta
Route::get('/daftar-maps', [MapController::class, 'loadAllMaps'])->name('daftar-maps');

// Route untuk menampilkan formulir tambah peta
Route::get('/add-maps', [MapController::class, 'loadAddMaps'])->name('add-maps');

// Route untuk menyimpan data peta yang baru
Route::post('/add-maps', [MapController::class, 'store'])->name('maps.store');

// Route untuk menampilkan formulir edit peta
Route::get('/maps/{id}/edit', [MapController::class, 'edit'])->name('edit-maps');

// Route untuk menyimpan perubahan pada peta yang sudah diedit
Route::put('/maps/{id}', [MapController::class, 'update'])->name('maps.update');

// Route untuk menghapus peta
Route::delete('/maps/{id}', [MapController::class, 'destroy'])->name('maps.destroy');



// RESTful API
// Route::resource('users', 'UserController');
// GET /users: Menampilkan daftar semua pengguna.
// GET /users/create: Menampilkan formulir untuk membuat pengguna baru.
// POST /users: Menyimpan data pengguna baru ke basis data.
// GET /users/{id}: Menampilkan detail pengguna dengan ID tertentu.
// GET /users/{id}/edit: Menampilkan formulir untuk mengedit pengguna dengan ID tertentu.
// PUT /users/{id}: Memperbarui data pengguna dengan ID tertentu.
// DELETE /users/{id}: Menghapus pengguna dengan ID tertentu.
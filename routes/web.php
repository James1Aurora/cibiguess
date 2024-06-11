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
use App\Http\Controllers\MiniMapController;
use App\Http\Controllers\DashBadgeController;
use App\Http\Controllers\SidebarController;
use App\Http\Controllers\LeaderboardController;

Route::get('/leaderboard', [LeaderboardController::class, 'leaderboard'])->name('index-leaderboard');


// MAIN ROUTE
Route::get('/', [MainController::class, 'index'])->name('home');

// AUTH
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerPost'])->name('register.post');
Route::get('main-menu', [GameController::class, 'index'])->middleware('auth')->name('main-menu');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
// PLAY GAME
Route::get('/main-menu', [GameController::class, 'index'])->name('game.menu');
Route::get('/game/start', [GameController::class, 'gameStart'])->name('game.start');
Route::post('/game/save-answer', [GameController::class, 'saveAnswer'])->name('game.saveAnswer');
Route::get('/game/next-question', [GameController::class, 'nextQuestion'])->name('game.nextQuestion');
Route::get('/game/result', [GameController::class, 'result'])->name('game.result');

Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');

Route::get('/donate', [MainController::class, 'donate'])->name('donate');
Route::get('/reviews', [ReviewController::class, 'index'])->name('review');
Route::get('/review/create', [ReviewController::class, 'create'])->name('review.create');
Route::post('/review/create', [ReviewController::class, 'store'])->name('review.store');

// sidebar

Route::middleware([AuthMiddleware::class])->prefix('/ad')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Route::get('/badge', [BadgeController::class, 'index'])->name('badge');
    // Route::post('/badge', [BadgeController::class, 'store'])->name('badge.store');
    // Route::post('/badge/{id}', [BadgeController::class, 'update'])->name('badge.update');
    // Route::delete('/badge/{id}', [BadgeController::class, 'destroy'])->name('badge.delete');

    // MINI MAP ROUTES
    Route::get('/minimaps', [MiniMapController::class, 'index'])->name('minimaps');
    Route::get('/minimaps/create', [MiniMapController::class, 'create'])->name('minimaps.create');
    Route::post('/minimaps', [MiniMapController::class, 'store'])->name('minimaps.store');
    Route::get('/minimaps/edit/{id}', [MiniMapController::class, 'edit'])->name('minimaps.edit');
    Route::post('/minimaps/edit/{id}', [MiniMapController::class, 'update'])->name('minimaps.update');
    Route::delete('/minimaps/{id}', [MiniMapController::class, 'destroy'])->name('minimaps.destroy');

    //DASHBOARD MAPS
    Route::get('/questions', [MapController::class, 'loadAllMaps'])->name('daftar-maps'); // Route untuk menampilkan semua peta
    Route::get('/questions/add', [MapController::class, 'loadAddMaps'])->name('add-maps'); // Route untuk menampilkan formulir tambah peta
    Route::post('/questions/add', [MapController::class, 'store'])->name('maps.store'); // Route untuk menyimpan data peta yang baru
    Route::get('/questions/{id}/edit', [MapController::class, 'edit'])->name('edit-maps'); // Route untuk menampilkan formulir edit peta
    Route::put('/questions/{id}', [MapController::class, 'update'])->name('maps.update'); // Route untuk menyimpan perubahan pada peta yang sudah diedit
    Route::delete('/questions/{id}', [MapController::class, 'destroy'])->name('maps.destroy'); // Route untuk menghapus peta

    // DASHBOARD USER
    Route::get('/users',[DashUsersController::class,'loadAllUsers'])->name('users');
    Route::get('/users/add',[DashUsersController::class,'loadAddUserForm'])->name('users.add');
    Route::post('/users/add',[DashUsersController::class,'AddUser'])->name('AddUser');
    Route::get('/users/edit/{id}',[DashUsersController::class,'loadEditForm'])->name('users.edit');
    Route::post('/users/edit',[DashUsersController::class,'EditUser'])->name('EditUser');
    Route::get('/users/{id}',[DashUsersController::class,'deleteUser'])->name('users.delete');

    Route::get('/sidebar', [SidebarController::class, 'showSidebar'])->name('sidebar');
    //DASHBOARD BADGES
    Route::get('/badges', [DashBadgeController::class, 'loadAllBadges'])->name('badges'); // Route untuk menampilkan daftar badge
    Route::get('/add-badge', [DashBadgeController::class, 'loadAddbadges'])->name('add-badge'); // Route untuk menampilkan form tambah badge
    Route::post('/add-badge', [DashBadgeController::class, 'store'])->name('badge.store'); // Route untuk menyimpan data badge
    Route::get('/badge/{id}/edit', [DashBadgeController::class, 'edit'])->name('edit-badge'); // Route untuk menampilkan formulir edit badge
    Route::put('/badge/{id}', [DashBadgeController::class, 'update'])->name('badge.update'); // Route untuk menyimpan perubahan pada badge yang sudah diedit
    Route::delete('/badge/{id}', [DashBadgeController::class, 'destroy'])->name('badge.destroy'); // Route untuk menghapus badge
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
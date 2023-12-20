<?php

use App\Http\Controllers\DashboardGenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SeassionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerchandiseController;
use App\Models\Genre;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Rute yang dapat diakses oleh semua orang
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [SeassionController::class, 'login'])->name('login');
Route::post('/login', [SeassionController::class, 'authenticate']);
Route::post('/logout', [SeassionController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/community', [ReviewController::class, 'index']);
Route::get('/store', [MerchandiseController::class, 'index']);
Route::get('/genre/{genre}', function ($genre) {
    return view('genre.' . strtolower($genre), [
        'title' => $genre
    ]);
});
Route::get('/genre', function () {
    $genres = Genre::all();
    return view('genre', [
        'title' => 'Genre',
        'genres' => $genres
    ]);
});


// Rute-rute dengan middleware 'auth' (hanya dapat diakses oleh pengguna yang sudah login)
Route::middleware(['auth'])->group(function () {
    Route::get('/user/home', [HomeController::class, 'userHome'])->name('user.home');
    Route::get('/user/genre/{genre}', function ($genre) {
        return view('genre.' . strtolower($genre), [
            'title' => $genre
        ]);
    })->name('user.genre');
    Route::get('/user/genre', function () {
        $genres = Genre::all();
        return view('user.genre', [
            'title' => 'Genre',
            'genres' => $genres
        ]);
    })->name('user.genre');
    Route::get('/user/community', [ReviewController::class, 'userHome'])->name('user.community');
    Route::get('/user/store', [MerchandiseController::class, 'UserHome'])->name('user.store');
});

// Rute-rute lainnya yang dapat diakses oleh semua orang
Route::get('/dashboard', function () {
    return view('dashboard.dashboard', [
        "title" => "Dashboard",
    ]);
});

Route::resource('/dashboard/genre', DashboardGenreController::class);

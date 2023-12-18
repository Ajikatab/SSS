<?php

use App\Http\Controllers\DashboardGenreController;
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


Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});



Route::get('/login', [SeassionController::class,'login']);
Route::post('/login', [SeassionController::class, 'authenticate']);

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

Route::get('/community', [ReviewController::class, 'index']);

Route::get('/store', [MerchandiseController::class, 'index']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);









Route::get('/dashboard', function () {
    return view('dashboard.dashboard', [
        "title" => "Dashboard",
    ]);
});

Route::resource('/dashboard/genre', DashboardGenreController::class);

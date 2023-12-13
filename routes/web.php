<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SeassionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
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


Route::get('/login', [SeassionController::class, 'index']);

Route::post('/login', [SeassionController::class, 'login']);

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

Route::get('/register', function () {
    return view('register', [
        "title" => "Register"
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard', [
        "title" => "Dashboard",
    ]);
});

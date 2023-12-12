<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SeassionController;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\HomeController;
use app\Http\Controllers\MoviesController;
use app\Http\Controllers\LoginController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MerchandiseController;

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




Route::get('/', 'HomeController@index');
Route::get('/login', 'LoginController@index');
Route::get('/movies', 'MoviesController@index');
Route::get('/top-movies', 'MoviesController@topMovies');
Route::get('/recent-discussions', 'DiscussionsController@index');
Route::get('/latest-reviews', 'ReviewsController@index');
Route::get('/genre/{genre}', [GenreController::class, 'showGenre']);
Route::get('/genre', [GenreController::class, 'index']);

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});


Route::get('/login', [SeassionController::class, 'index']);

Route::post('/login', [SeassionController::class, 'login']);


Route::get('/community', [ReviewController::class, 'index']);

Route::get('/store', [MerchandiseController::class, 'index']);

Route::get('/register', function () {
    return view('register', [
        "title" => "Register"
    ]);
});

Route::get('/genre', function () {
    return view('genre', [
        'title' => 'genre'
    ]);
});


Route::get('/action', function () {
    return view('genre.action', [
        'title' => 'Action'
    ]);
});

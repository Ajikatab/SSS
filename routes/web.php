<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SeassionController;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\HomeController;
use app\Http\Controllers\MoviesController;
use app\Http\Controllers\LoginController;
use App\Http\Controllers\GenreController;

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


// Route::get('/login', function () {
//     return view('login', [
//         "title" => "Login"
//     ]);
// });

Route::get('/login', [SeassionController::class,'index']);

Route::post('/login', [SeassionController::class,'login']);


Route::get('/community', [ReviewController::class, 'index']);

Route::get('/store', function () {
    return view('store', [
        "title" => "Store"
    ]);
});

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
Route::get('/adventure', function () {
    return view('genre.adventure', [
        'title' => 'Adventure'
    ]);
});
Route::get('/animation', function () {
    return view('genre.animation', [
        'title' => 'Animation'
    ]);
});
Route::get('/anime', function () {
    return view('genre.anime', [
        'title' => 'Anime'
    ]);
});
Route::get('/biography', function () {
    return view('genre.biography', [
        'title' => 'Biography'
    ]);
});
Route::get('/comedy', function () {
    return view('genre.comedy', [
        'title' => 'Comedy'
    ]);
});
Route::get('/Crime', function () {
    return view('genre.crime', [
        'title' => 'Crime'
    ]);
});
Route::get('/documentary', function () {
    return view('genre.documentary', [
        'title' => 'Documentary'
    ]);
});
Route::get('/drama', function () {
    return view('genre.drama', [
        'title' => 'Drama'
    ]);
});
Route::get('/family', function () {
    return view('genre.family', [
        'title' => 'Family'
    ]);
});
Route::get('/fantasy', function () {
    return view('genre.fantasy', [
        'title' => 'Fantasy'
    ]);
});
Route::get('/history', function () {
    return view('genre.history', [
        'title' => 'History'
    ]);
});
Route::get('/horror', function () {
    return view('genre.horror', [
        'title' => 'Horror'
    ]);
});
Route::get('/music', function () {
    return view('genre.music', [
        'title' => 'Music'
    ]);
});
Route::get('/mystery', function () {
    return view('genre.mystery', [
        'title' => 'Mystery'
    ]);
});
Route::get('/romance', function () {
    return view('genre.romance', [
        'title' => 'Romance'
    ]);
});
Route::get('/sciencefiction', function () {
    return view('genre.sciencefiction', [
        'title' => 'Science Fiction'
    ]);
});
Route::get('/sport', function () {
    return view('genre.sport', [
        'title' => 'Sport'
    ]);
});
Route::get('/thriller', function () {
    return view('genre.thriller', [
        'title' => 'Thriller'
    ]);
});
Route::get('/war', function () {
    return view('genre.war', [
        'title' => 'War'
    ]);
});
Route::get('/western', function () {
    return view('genre.western', [
        'title' => 'Western'
    ]);
});
<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\HomeController;
use app\Http\Controllers\MoviesController;
use app\Http\Controllers\LoginController;


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

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/community', function () {
    return view('community');
});

Route::get('/store', function () {
    return view('store');
});

Route::get('/register', function () {
    return view('register');
});

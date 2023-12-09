<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SeassionController;
use Illuminate\Support\Facades\Route;

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

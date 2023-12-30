<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardGenreController;
use App\Http\Controllers\DashboardMerchandiseController;
use App\Http\Controllers\DashboardMovieController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SeassionController;
use App\Http\Controllers\UpdateProfileInformationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerchandiseController;
use App\Http\Controllers\MovieController;
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
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movies.show');
Route::get('/login', [SeassionController::class, 'login'])->name('login');
Route::post('/login', [SeassionController::class, 'authenticate']);
Route::post('/logout', [SeassionController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/community', [ReviewController::class, 'index']);
Route::get('/store', [MerchandiseController::class, 'index']);
Route::get('/genre', [GenreController::class, 'index']);
Route::get('/genre/{name}', [GenreController::class, 'show'])->name('genres.show');


// Rute-rute dengan middleware 'auth' (hanya dapat diakses oleh pengguna yang sudah login)
Route::middleware(['auth'])->group(function () {
    Route::get('/user/home', [HomeController::class, 'userHome'])->name('user.home');
    Route::get('/user/genre/', [GenreController::class, 'indexHome'])->name('user.genres');
    Route::get('/user/genre/{name}', [GenreController::class, 'userGenre'])->name('user.genres.show');
    Route::get('/user/movie/{id}', [MovieController::class, 'userShow'])->name('user.movies.show');
    Route::get('/user/community', [ReviewController::class, 'userHome'])->name('user.community');
    Route::get('/user/edit', [UpdateProfileInformationController::class, 'edit'])->name('profile.edit');
    Route::put('/user/update', [UpdateProfileInformationController::class, 'update'])->name('profile.update');
    Route::get('/user/store', [MerchandiseController::class, 'userStore'])->name('user.store');
    Route::get('/user/community/create', [ReviewController::class, 'create'])->name('posts.create');
    Route::post('/user/community/store', [ReviewController::class, 'store'])->name('posts.store');
    Route::get('/user/checkout', [CheckoutController::class, 'showForm']);
    Route::post('/process-checkout', [CheckoutController::class, 'processCheckout'])->name('process.checkout');
    Route::post('/confirmation', [CheckoutController::class, 'confirmation'])->name('confirmation');
    Route::get('/confirmation/{id}', [CheckoutController::class, 'showConfirmationPage'])->name('confirmation.page');
});


Route::group(['middleware' => 'role:admin'], function () {
    Route::view('/dashboard', 'dashboard.dashboard', ['title' => 'Dashboard'])->name('dashboard.dashboard');
    Route::get('/dashboard/store', [DashboardMerchandiseController::class, 'index'])->name('store.index');
    Route::get('/dashboard/store/create', [DashboardMerchandiseController::class, 'create'])->name('store.create');
    Route::post('/dashboard/store/store', [DashboardMerchandiseController::class, 'store'])->name('store.store');
    Route::get('/dashboard/store/{id}', [DashboardMerchandiseController::class, 'edit'])->name('store.edit');
    Route::put('/dashboard/store/{id}/update', [DashboardMerchandiseController::class, 'update'])->name('store.update');
    Route::delete('/dashboard/store/{id}', [DashboardMerchandiseController::class, 'destroy'])->name('store.delete');
});

Route::resource('/dashboard/genre', DashboardGenreController::class);
Route::resource('/dashboard/store', DashboardMerchandiseController::class);
Route::resource('/dashboard/movie', DashboardMovieController::class);

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $MoviesPopular = Http::withToken(config('services.tmdb.api'))->get('https://api.themoviedb.org/3/movie/popular')->json()['results'];

        $genresArray = Http::withToken(config('services.tmdb.api'))->get('https://api.themoviedb.org/3/genre/movie/list')->json()['genres'];
        $genres = collect($genresArray)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        $MovieList = Http::withToken(config('services.tmdb.api'))->get('https://api.themoviedb.org/3/movie/top_rated')->json()['results'];
        foreach ($MovieList as &$movie) {
            $movieDetails = Http::withToken(config('services.tmdb.api'))->get("https://api.themoviedb.org/3/movie/{$movie['id']}")->json();

            // Pastikan 'runtime' tersedia dalam respons API
            if (isset($movieDetails['runtime'])) {
                $movie['runtime'] = $movieDetails['runtime'];
            } else {
                $movie['runtime'] = null;
            }

            // Mengambil genre berdasarkan nama dari $genres
            if (isset($movie['genre_ids'][0]) && isset($genres[$movie['genre_ids'][0]])) {
                $movie['genre_name'] = $genres[$movie['genre_ids'][0]];
            } else {
                $movie['genre_name'] = 'Genre not available';
            }
        }
        // dd($MoviesPopular);

        return view('home', [
            'title' => 'Home',
            'movies' => $MoviesPopular,
            'genres' => $genres,
            'MovieList' => $MovieList,

        ]);
    }
    public function userHome()
    {

        $user = Auth::user();
        return view('user.home', [
            'title' => 'Home',
            'user' => $user,

        ]);
    }
}

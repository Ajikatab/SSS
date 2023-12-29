<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;

class GenreController extends Controller
{
    public function index()
    {
        $response = Http::withToken(config('services.tmdb.api'))->get('https://api.themoviedb.org/3/genre/movie/list');

        // Tampilkan respons JSON untuk memeriksa data yang diterima dari TMDb
        // dd($response->json());

        $genresArray = $response->json()['genres'];
        $genres = collect($genresArray)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        return view('genre', [
            'title' => 'Genre',
            'genres' => $genres,
        ]);
    }
    public function userGenre($name)
    {
        // Fetch genre data from TMDB
        $response = Http::withToken(config('services.tmdb.api'))
            ->get("https://api.themoviedb.org/3/genre/movie/list")
            ->json();

        $genres = collect($response['genres']);

        // Find the genre by name
        $genre = $genres->firstWhere('name', $name);

        if (!$genre) {
            abort(404); // Handle the case where the genre is not found
        }

        $title = $genre['name'];

        // Fetch movies for the specific genre
        $moviesResponse = Http::withToken(config('services.tmdb.api'))
            ->get("https://api.themoviedb.org/3/discover/movie", [
                'with_genres' => $genre['id'],
            ])
            ->json();

        $movies = $moviesResponse['results'];

        // Fetch all genres for the sidebar
        $allGenres = collect(Http::withToken(config('services.tmdb.api'))
            ->get("https://api.themoviedb.org/3/genre/movie/list")
            ->json()['genres']);

        // Fetch user data
        $user = Auth::user();

        return view('user.genre.show', [
            'title' => $title,
            'user' => Auth::user(),
            'genres' => $allGenres,
            'genreId' => $genre['id'],
            'videos' => $movies,
        ]);
    }

    public function indexHome()
    {
        $response = Http::withToken(config('services.tmdb.api'))->get('https://api.themoviedb.org/3/genre/movie/list');

        // Tampilkan respons JSON untuk memeriksa data yang diterima dari TMDb
        // dd($response->json());

        $genresArray = $response->json()['genres'];
        $genres = collect($genresArray)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        $user = Auth::user();

        return view('user.genre', [
            'title' => 'Genre',
            'genres' => $genres,
            'user' => Auth::user(),
        ]);
    }


    public function show($name)
    {
        // Fetch genre data from TMDB
        $response = Http::withToken(config('services.tmdb.api'))
            ->get("https://api.themoviedb.org/3/genre/movie/list")
            ->json();

        $genres = collect($response['genres']);

        // Find the genre by name
        $genre = $genres->firstWhere('name', $name);

        if (!$genre) {
            abort(404); // Handle the case where the genre is not found
        }

        $title = $genre['name'];

        // Fetch movies for the specific genre
        $moviesResponse = Http::withToken(config('services.tmdb.api'))
            ->get("https://api.themoviedb.org/3/discover/movie", [
                'with_genres' => $genre['id'],
            ])
            ->json();

        $movies = $moviesResponse['results'];
        // dd($movies);

        return view('genre.show', [
            'genreId' => $genre['id'],
            'title' => $title,
            'videos' => $movies,
        ]);
    }
}

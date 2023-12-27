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
        foreach ($MoviesPopular as &$movie) {
            $videos = Http::withToken(config('services.tmdb.api'))
                ->get("https://api.themoviedb.org/3/movie/{$movie['id']}/videos")
                ->json()['results'];

            // Ambil tautan trailer pertama (jika ada)
            $movie['trailer_link'] = isset($videos[0]) ? 'https://www.youtube.com/watch?v=' . $videos[0]['key'] : '#';
        }

        $genresArray = Http::withToken(config('services.tmdb.api'))->get('https://api.themoviedb.org/3/genre/movie/list')->json()['genres'];
        $genres = collect($genresArray)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        $MovieList = Http::withToken(config('services.tmdb.api'))
            ->get('https://api.themoviedb.org/3/movie/now_playing')
            ->json()['results'];

        foreach ($MovieList as &$movie) {
            $movieDetails = Http::withToken(config('services.tmdb.api'))
                ->get("https://api.themoviedb.org/3/movie/{$movie['id']}")
                ->json();

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

        $comingSoonMovies = Http::withToken(config('services.tmdb.api'))
            ->get('https://api.themoviedb.org/3/movie/upcoming')
            ->json()['results'];
        foreach ($comingSoonMovies as &$movie) {
            $movieDetails = Http::withToken(config('services.tmdb.api'))->get("https://api.themoviedb.org/3/movie/{$movie['id']}")->json();
            if (isset($movie['genre_ids'][0]) && isset($genres[$movie['genre_ids'][0]])) {
                $movie['genre_name'] = $genres[$movie['genre_ids'][0]];
            } else {
                $movie['genre_name'] = 'Genre not available';
            }
        }

        $MoviesTop = Http::withToken(config('services.tmdb.api'))->get('https://api.themoviedb.org/3/movie/top_rated')->json()['results'];
        foreach ($MoviesTop as &$movTop) {
            $movieDetails = Http::withToken(config('services.tmdb.api'))
                ->get("https://api.themoviedb.org/3/movie/{$movTop['id']}")
                ->json();

            // Pastikan 'runtime' tersedia dalam respons API
            if (isset($movieDetails['runtime'])) {
                $movTop['runtime'] = $movieDetails['runtime'];
            } else {
                $movTop['runtime'] = null;
            }

            // Mengambil genre berdasarkan nama dari $genres
            if (isset($movTop['genre_ids'][0]) && isset($genres[$movTop['genre_ids'][0]])) {
                $movTop['genre_name'] = $genres[$movTop['genre_ids'][0]];
            } else {
                $movTop['genre_name'] = 'Genre not available';
            }
        }

        // dd($comingSoonMovies);

        return view('home', [
            'title' => 'Home',
            'movies' => $MoviesPopular,
            'genres' => $genres,
            'MovieList' => $MovieList,
            'comingSoonMovies' => $comingSoonMovies,
            'moviesTop' => $MoviesTop,
        ]);
    }
    public function userHome()
    {
        $MoviesPopular = Http::withToken(config('services.tmdb.api'))->get('https://api.themoviedb.org/3/movie/popular')->json()['results'];
        foreach ($MoviesPopular as &$movie) {
            $videos = Http::withToken(config('services.tmdb.api'))
                ->get("https://api.themoviedb.org/3/movie/{$movie['id']}/videos")
                ->json()['results'];

            // Ambil tautan trailer pertama (jika ada)
            $movie['trailer_link'] = isset($videos[0]) ? 'https://www.youtube.com/watch?v=' . $videos[0]['key'] : '#';
        }

        $genresArray = Http::withToken(config('services.tmdb.api'))->get('https://api.themoviedb.org/3/genre/movie/list')->json()['genres'];
        $genres = collect($genresArray)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        $MovieList = Http::withToken(config('services.tmdb.api'))
            ->get('https://api.themoviedb.org/3/movie/now_playing')
            ->json()['results'];

        foreach ($MovieList as &$movie) {
            $movieDetails = Http::withToken(config('services.tmdb.api'))
                ->get("https://api.themoviedb.org/3/movie/{$movie['id']}")
                ->json();

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

        $comingSoonMovies = Http::withToken(config('services.tmdb.api'))
            ->get('https://api.themoviedb.org/3/movie/upcoming')
            ->json()['results'];
        foreach ($comingSoonMovies as &$movie) {
            $movieDetails = Http::withToken(config('services.tmdb.api'))->get("https://api.themoviedb.org/3/movie/{$movie['id']}")->json();
            if (isset($movie['genre_ids'][0]) && isset($genres[$movie['genre_ids'][0]])) {
                $movie['genre_name'] = $genres[$movie['genre_ids'][0]];
            } else {
                $movie['genre_name'] = 'Genre not available';
            }
        }

        $MoviesTop = Http::withToken(config('services.tmdb.api'))->get('https://api.themoviedb.org/3/movie/top_rated')->json()['results'];
        foreach ($MoviesTop as &$movTop) {
            $movieDetails = Http::withToken(config('services.tmdb.api'))
                ->get("https://api.themoviedb.org/3/movie/{$movTop['id']}")
                ->json();

            // Pastikan 'runtime' tersedia dalam respons API
            if (isset($movieDetails['runtime'])) {
                $movTop['runtime'] = $movieDetails['runtime'];
            } else {
                $movTop['runtime'] = null;
            }

            // Mengambil genre berdasarkan nama dari $genres
            if (isset($movTop['genre_ids'][0]) && isset($genres[$movTop['genre_ids'][0]])) {
                $movTop['genre_name'] = $genres[$movTop['genre_ids'][0]];
            } else {
                $movTop['genre_name'] = 'Genre not available';
            }
        }

        // dd($comingSoonMovies);

        $user = Auth::user();
        return view('user.home', [
            'title' => 'Home',
            'user' => $user,
            'movies' => $MoviesPopular,
            'genres' => $genres,
            'MovieList' => $MovieList,
            'comingSoonMovies' => $comingSoonMovies,
            'moviesTop' => $MoviesTop,

        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function show($id)
    {
        $movieDetails = Http::withToken(config('services.tmdb.api'))->get("https://api.themoviedb.org/3/movie/{$id}")->json();
        $videosResponse = Http::withToken(config('services.tmdb.api'))
            ->get("https://api.themoviedb.org/3/movie/{$id}/videos")
            ->json();

        $videos = $videosResponse['results'];

        // Get the first video key (assuming it's a YouTube key)
        $trailerLink = isset($videos[0]['key']) ? "https://www.youtube.com/watch?v={$videos[0]['key']}" : null;
        $recommendedMoviesResponse = Http::withToken(config('services.tmdb.api'))
            ->get("https://api.themoviedb.org/3/movie/{$id}/recommendations")
            ->json();

        $recommendedMovies = $recommendedMoviesResponse['results'];

        // dd($movieDetails);

        return view('movies.show', [
            'title' => $movieDetails['title'], // Tambahkan judul ke dalam array
            'movieDetails' => $movieDetails,
            'trailerLink' => $trailerLink,
            'recommendedMovies' => $recommendedMovies,
        ]);
    }
}

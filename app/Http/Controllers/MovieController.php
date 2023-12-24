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
        // dd($movieDetails);

        return view('movies.show', [
            'title' => $movieDetails['title'], // Tambahkan judul ke dalam array
            'movieDetails' => $movieDetails,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GenreController extends Controller
{
    public function index()
    {
        // Lakukan sesuatu berdasarkan jenis genre yang diberikan
        // Contoh: tampilkan view yang sesuai dengan genre
        $genre = Genre::all();
        return view('genre', [
            'title' => 'Genre',
            'genres' => $genre
        ]);
    }
    public function userHome()
    {
        $genre = Genre::all();
        $user = Auth::user();
        return view('user.genre', [
            'title' => 'Genre',
            'user' => $user,
            'genres' => $genre
        ]);
    }
}

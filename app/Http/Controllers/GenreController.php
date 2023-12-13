<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function showGenre($genre)
    {
        // Lakukan sesuatu berdasarkan jenis genre yang diberikan
        // Contoh: tampilkan view yang sesuai dengan genre
        return view('genre.' . $genre);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardGenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::withToken(config('services.tmdb.api'))->get('https://api.themoviedb.org/3/genre/movie/list');

        $genres = $response->json()['genres'] ?? [];

        foreach ($genres as $genre) {
            Genre::updateOrCreate(
                ['tmdb_id' => $genre['id']],
                ['category_name' => $genre['name']]
            );
        }

        $genres = Genre::orderBy('id', 'desc')->get();
        // dd($genres);

        return view('dashboard.genre', [
            'title' => 'Genre',
            'genres' => $genres
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.genre.create', [
            'title' => 'Create Genre',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $genres = Genre::create([
            'tmdb_id' => null,
            'category_name' => $validatedData['name'],
        ]);

        return redirect('/dashboard/genre')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        return view('dashboard.genre.show', [
            'genre' => $genre
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genres = Genre::find($id);

        // You can perform additional actions or fetch more data if needed

        return view('dashboard.genre.edit', [
            'title' => 'Update Store',
            'genre' => $genres,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $genres = Genre::find($id);

        // Perbarui data berdasarkan input dari formulir
        $genres->update([
            'category_name' => $request->input('name'),
        ]);

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect('/dashboard/genre')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genres = Genre::find($id);

        // Hapus data spesifik jika diperlukan
        $genres->delete();
        // dd($genres);

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect('/dashboard/genre')->with('success', 'Data Berhasil Dihapus');
    }
}

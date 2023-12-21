<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Merchandise;
use Illuminate\Http\Request;

class DashboardMerchandiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Merchandise::All();
        return view('dashboard.store', [
            'title' => 'Store',
            'stores' => $stores
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.store.create', [
            'title' => 'Create Store',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageFile = $request->file('image');
        $fileName = time() . '.' . $imageFile->getClientOriginalExtension();
        $imagePath = $imageFile->storeAs('image-store', $fileName, 'public');

        // Simpan nama file ke dalam model atau variabel
        $merchandise = Merchandise::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'stock_quantity' => $validatedData['stock'],
            'image' => $fileName, // Simpan nama file ke dalam model
        ]);

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect('/dashboard/store')->with('success', 'Data Berhasil Ditambah');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stores = Merchandise::find($id);

        // You can perform additional actions or fetch more data if needed

        return view('dashboard.store.edit', [
            'title' => 'Update Store',
            'store' => $stores, // Pass the store data to the view
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $stores = Merchandise::find($id);

        // Perbarui data berdasarkan input dari formulir
        $stores->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock_quantity' => $request->input('stock'),
            // Tambahkan kolom lain sesuai kebutuhan
        ]);

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect('/dashboard/store')->with('success', 'Data Berhasil Diupdate');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $store = Merchandise::find($id);

        // Hapus data spesifik jika diperlukan
        $store->delete();

        // Redirect atau berikan respons sesuai kebutuhan
        return redirect('/dashboard/store')->with('success', 'Data Berhasil Dihapus');
    }
}

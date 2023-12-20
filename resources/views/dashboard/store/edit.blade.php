@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Store</h1>

    </div>
    <form action="{{ route('store.update', ['store' => $store->id]) }}" method="POST">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Baru"
                value="{{ $store->name }}">
        </div>
        <div class="form-group mt-3">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" id="description"
                placeholder="Masukkan Deskripsi Baru" value="{{ $store->description }}">
        </div>
        <div class="form-group mt-3">
            <label for="price">Price</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Masukkan Harga Baru"
                value="{{ $store->price }}">
        </div>
        <div class="form-group mt-3">
            <label for="stock">Stock</label>
            <input type="text" class="form-control" name="stock" id="stock" placeholder="Masukkan Stok"
                value="{{ $store->stock_quantity }}">
        </div>
        <div class="form-group mt-3">
            <input type="file" class="form-control-file" id="file">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@endsection

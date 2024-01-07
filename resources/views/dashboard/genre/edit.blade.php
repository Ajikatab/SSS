@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Genre</h1>

    </div>
    <form action="{{ route('genres.update', ['id' => $genre['id']]) }}" method="POST">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="name">Nama Genre</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Baru"
                value="{{ $genre->category_name }}">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@endsection

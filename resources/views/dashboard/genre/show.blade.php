@extends('dashboard.layouts.main')
@section('container')
    <h1>Genre</h1>
    @foreach ($genres as $genre)
        <div class="row">
            <div class="col-md-3">
                <a href="{{ url('genre/' . strtolower($genre->category_name)) }}"
                    class="genre-button">{{ $genre->category_name }}</a>
            </div>
        </div>
    @endforeach
@endsection

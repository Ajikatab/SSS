@extends('user.layouts.main')

@section('container')
    <div class="container">
        <div class="button-row">
            <h1>Genre</h1>
            <div class="button-container">
                @foreach ($genres as $id => $name)
                    <a href="{{ route('user.genres.show', ['name' => $name]) }}" class="genre-button">{{ $name }}</a>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="button-row">
            <h1 class="genre"></h1>
            <div class="button-container">
                @foreach ($genres as $id => $name)
                    <a href="{{ route('genres.show', ['name' => $name]) }}" class="genre-button">{{ $name }}</a>
                @endforeach
            </div>
        </div>
    </div>
@endsection

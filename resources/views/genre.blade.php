@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <h1>Genre</h1>
            <ul>
                @foreach ($genres as $id => $name)
                    <li><a href="{{ route('genres.show', ['name' => $name]) }}">{{ $name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

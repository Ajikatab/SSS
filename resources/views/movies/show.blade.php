@extends('layouts.main')

@section('container')
    <div class="movie-details-container">
        <div class="movie-poster">
            <img src="https://image.tmdb.org/t/p/original{{ $movieDetails['poster_path'] }}"
                alt="{{ $movieDetails['title'] }}" />
        </div>
        <div class="movie-info">
            <h1>{{ $movieDetails['title'] }}</h1>
            <p>Sinopsis: {{ $movieDetails['overview'] }}</p>
            <p>Rating: {{ $movieDetails['vote_average'] }}</p>
            <p>Durasi: {{ $movieDetails['runtime'] }} min</p>
            <p>Tahun Rilis: {{ \Carbon\Carbon::parse($movieDetails['release_date'])->format('M d, Y') }}</p>
            <a href="{{ $trailerLink }}" class="trailer-button" target="_blank">Watch Trailer</a>
        </div>
    </div>
@endsection

<style>
    .movie-details-container {
        display: flex;
        margin: 20px;
    }

    .movie-poster {
        flex: 1;
        margin-right: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .movie-poster img {
        width: 100%;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .trailer-button {
        display: block;
        padding: 10px;
        text-align: center;
        background-color: #3490dc;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }

    .movie-info {
        flex: 2;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }
</style>

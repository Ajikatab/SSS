@extends('user.layouts.main')

@section('container')
    <div class="movie-details-container">
        <div class="movie-poster">
            <img src="https://image.tmdb.org/t/p/original{{ $movieDetails['poster_path'] }}"
                alt="{{ $movieDetails['title'] }}" />
        </div>
        <div class="movie-info">
            <h1 class="heading" style="margin-top: 50px;">{{ $movieDetails['title'] }}</h1>
            <p class="overview">{{ $movieDetails['overview'] }}</p>
            <div class="details">
                <p><strong>Rating:</strong> {{ $movieDetails['vote_average'] }}</p>
                <p><strong>Durasi:</strong> {{ $movieDetails['runtime'] }} min</p>
                <p><strong>Tahun Rilis:</strong>
                    {{ \Carbon\Carbon::parse($movieDetails['release_date'])->format('M d, Y') }}</p>
            </div>
            <a href="{{ $trailerLink }}" class="trailer-button" target="_blank">Watch Trailer</a>
        </div>
    </div>
    <section class="coming" id="coming">
        <h2 class="heading">Recommended</h2>
        <!-- recommended container -->
        <div class="coming-container swiper">
            <div class="swiper-wrapper">
                <!-- Loop through your recommended movie data here -->
                @foreach ($recommendedMovies as $recommendedMovie)
                    <div class="swiper-slide box">
                        <a href="{{ route('user.movies.show', ['id' => $recommendedMovie['id']]) }}">
                            <div class="box-img">
                                <!-- Use poster_path from TMDb -->
                                <img src="https://image.tmdb.org/t/p/original{{ $recommendedMovie['poster_path'] }}"
                                    alt="{{ $recommendedMovie['title'] }}" />
                            </div>
                        </a>
                        <h3>{{ $recommendedMovie['title'] }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

<style>
    .movie-details-container {
        display: flex;
        /* margin: 20px; */
        /* background-color: #000000; */
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .movie-poster {
        flex: 1;
        margin-right: 20px;
    }

    .movie-poster img {
        width: 300px;
        /* Set a fixed width */
        height: 450px;
        /* Set a fixed height */
        object-fit: cover;
        /* Maintain aspect ratio while covering the defined dimensions */
        border-radius: 8px;
        margin-top: 100px;
        margin-left: 100px;
    }

    .movie-info {
        flex: 2;
        padding: 20px;
    }

    h1 {
        margin-bottom: 10px;
        font-size: 24px;
    }

    .overview {
        font-size: 16px;
        margin-bottom: 20px;
    }

    .details {
        margin-bottom: 20px;
    }

    .details p {
        margin-bottom: 8px;
    }

    .trailer-button {
        display: inline-block;
        padding: 10px;
        text-align: center;
        background-color: #3490dc;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .trailer-button:hover {
        background-color: #2779bd;
    }
</style>

@extends('layouts.main')

@section('container')
    <!-- Home  -->
    <section class="home swiper" id="home">
        <div class="swiper-wrapper">
            @foreach (collect($movies)->take(5) as $movie)
                {{-- Convert to collection and display only 5 movies --}}
                <div class="swiper-slide container">
                    <img src="https://image.tmdb.org/t/p/original{{ $movie['backdrop_path'] }}" alt="{{ $movie['title'] }}" />
                    <div class="home-text">
                        @if (isset($movie['genre_ids']))
                            <span>
                                @foreach ($movie['genre_ids'] as $genre_id)
                                    {{ $genres[$genre_id] }}@if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </span>
                        @endif
                        <h1>{{ $movie['title'] }}</h1>
                        <a href="{{ route('movies.show', ['id' => $movie['id']]) }}" class="btn">Read More</a>
                        <a href="#" class="play">
                            <i class="bx bx-play"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </section>

    <!-- Movies  -->
    <div class="movies" id="movies">
        <h2 class="heading">Top Rated Movies</h2>
        <!-- Movies container  -->
        <div class="movies-container">
            <!-- Loop through your TMDb movie data here -->
            @foreach ($MovieList as $movList)
                <div class="box">
                    <div class="box-img">
                        <!-- Gunakan poster_path dari TMDb -->
                        <img src="https://image.tmdb.org/t/p/original{{ $movList['poster_path'] }}"
                            alt="{{ $movList['title'] }}" />
                    </div>
                    <h3>{{ $movList['title'] }}</h3>
                    <span>
                        {{ isset($movList['runtime']) ? $movList['runtime'] . ' min' : 'Runtime not available' }}
                        |
                        @if (isset($movList['genre_ids']) && is_array($movList['genre_ids']))
                            @foreach ($movList['genre_ids'] as $genreId)
                                {{ $genres[$genreId] ?? 'Genre not available' }}
                                @if (!$loop->last)
                                    <!-- Jika bukan genre terakhir, tampilkan koma -->
                                    ,
                                @endif
                            @endforeach
                        @else
                            Genre not available
                        @endif
                    </span>
                    <a href="{{ route('movies.show', ['id' => $movList['id']]) }}">Detail</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

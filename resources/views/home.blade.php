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
                        <a href="{{ $movie['trailer_link'] }}" class="play" target="_blank">
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
        <h2 class="heading">Now Playing In Theatres.</h2>
        <!-- Movies container  -->
        <div class="movies-container">
            <!-- Loop through your TMDb movie data here -->
            @foreach ($MovieList as $movList)
                <div class="box">
                    <a href="{{ route('movies.show', ['id' => $movList['id']]) }}">
                        <div class="box-img">
                            <!-- Gunakan poster_path dari TMDb -->
                            <img src="https://image.tmdb.org/t/p/original{{ $movList['poster_path'] }}"
                                alt="{{ $movList['title'] }}" />
                        </div>
                    </a>
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
                </div>
            @endforeach
        </div>
    </div>

    {{-- Top Movies --}}
    <div class="movies" id="movies">
        <h2 class="heading">Top Rated Movies</h2>
        <!-- Movies container  -->
        <div class="movies-container" id="moviesContainer">
            <!-- Loop through your TMDb movie data here -->
            @foreach ($moviesTop as $index => $movTop)
                @if ($index < 5)
                    <!-- Tampilkan hanya 5 film pertama -->
                    <div class="box">
                        <a href="{{ route('movies.show', ['id' => $movTop['id']]) }}">
                            <div class="box-img">
                                <!-- Gunakan poster_path dari TMDb -->
                                <img src="https://image.tmdb.org/t/p/original{{ $movTop['poster_path'] }}"
                                    alt="{{ $movTop['title'] }}" />
                            </div>
                        </a>
                        <h3>{{ $movTop['title'] }}</h3>
                        <span>
                            {{ isset($movTop['runtime']) ? $movTop['runtime'] . ' min' : 'Runtime not available' }}
                            |
                            @if (isset($movTop['genre_ids']) && is_array($movTop['genre_ids']))
                                @foreach ($movTop['genre_ids'] as $genreId)
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
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <!-- coming  -->
    <section class="coming" id="coming">
        <h2 class="heading">Coming Soon</h2>
        <!-- coming container -->
        <div class="coming-container swiper">
            <div class="swiper-wrapper">
                <!-- Loop through your TMDb coming soon movie data here -->
                @foreach ($comingSoonMovies as $comingSoonMovie)
                    <div class="swiper-slide box">
                        <a href="{{ route('movies.show', ['id' => $comingSoonMovie['id']]) }}">
                            <div class="box-img">
                                <!-- Gunakan poster_path dari TMDb -->
                                <img src="https://image.tmdb.org/t/p/original{{ $comingSoonMovie['poster_path'] }}"
                                    alt="{{ $comingSoonMovie['title'] }}" />
                            </div>
                        </a>
                        <h3>{{ $comingSoonMovie['title'] }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

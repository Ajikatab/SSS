@extends('user.layouts.main')

@section('container')
    <!-- Movies  -->
    <div class="movies" id="movies" style="margin-top: 80px;"> <!-- Add margin-top for space below the navbar -->
        <h2 class="heading">{{ $title }}</h2>
        <!-- Movies container  -->
        <div class="movies-container">
            @php
                use Carbon\Carbon;
            @endphp
            @foreach ($videos as $video)
                <div class="box">
                    <a href="{{ route('movies.show', ['id' => $video['id']]) }}">
                        <div class="box-img">
                            <img src="https://image.tmdb.org/t/p/original{{ $video['poster_path'] }}"
                                alt="{{ $video['title'] }}" />
                        </div>
                    </a>
                    <h3>{{ $video['title'] }}</h3>
                    @if (isset($video['release_date']))
                        <span>{{ Carbon::parse($video['release_date'])->format('Y') }}</span>
                    @else
                        <span>Release date not available</span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection

@extends('user.layouts.main')

@section('container')
    <div class="container">
        <h1>Videos for Genre {{ $title }}</h1>
        <!-- Movies  -->
        <div class="movies" id="movies">
            <!-- Movies container  -->
            <div class="movies-container">
                @php
                    use Carbon\Carbon;
                @endphp
                @foreach ($videos as $video)
                    <div class="box">
                        <div class="box-img">
                            <img src="{{ $video['poster_path'] }}" alt="{{ $video['title'] }}" />
                        </div>
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
    </div>
@endsection

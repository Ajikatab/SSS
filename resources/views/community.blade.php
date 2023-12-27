@extends('layouts.main')

@section('container')
    <div style="margin-top: 50px; margin-bottom: 20px;">
        <h1 style="margin-bottom: 20px;">Movie Reviews</h1>

        <div style="display: flex; flex-wrap: wrap;">
            @foreach ($reviews as $review)
                <div style="width: calc(50% - 20px); margin-right: 20px; margin-bottom: 20px;">
                    <div style="border: 1px solid #ddd; border-radius: 5px; overflow: hidden;">
                        <div style="width: 100%;">
                            <div style="width: 66.66%; float: left;">
                                <div style="padding: 15px;">
                                    <h5 style="margin-bottom: 10px;">{{ $review->username }}</h5>
                                    <p style="margin-bottom: 10px;">{{ $review->comment }}</p>
                                    <p style="margin-bottom: 10px;"><small
                                            style="color: #777;">{{ $review->created_at->diffForHumans() }}</small></p>
                                    <p style="margin-bottom: 0;">Rating: {{ $review->rating }}</p>
                                </div>
                            </div>
                            <div style="width: 100%;">
                                @if ($review->tmdb_image)
                                    <img src="{{ $review->tmdb_image }}" style="width: 100%;" alt="{{ $review->username }}">
                                @else
                                    <p>No image available</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@extends('layouts.main')

@section('container')
    <h1>Movie Reviews</h1>

    <div class="row">
        @foreach ($reviews as $review)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $review->username }}</h5>
                                <p class="card-text">{{ $review->comment }}</p>
                                <p class="card-text"><small
                                        class="text-muted">{{ $review->created_at->DiffForHumans() }}</small></p>
                                <p class="card-text">Rating: {{ $review->rating }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ $review->image }}" class="card-img" alt="{{ $review->username }}">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

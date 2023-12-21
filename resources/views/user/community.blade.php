@extends('user.layouts.main')

@section('container')
    <h1>Movies Reviews</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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

    <!-- Form untuk Create Post -->
    <div class="row mt-4">
        <div class="col-md-6">
            <h2>Review Baru</h2>
            <form action="{{ route('posts.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                        value="{{ auth()->user()->username }}" readonly>
                </div>
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="rating">Rating</label>
                    <input type="number" class="form-control" id="rating" name="rating" min="1" max="5"
                        required>
                </div>
                <div class="form-group">
                    <label for="image">Image URL</label>
                    <input type="url" class="form-control" id="image" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
@endsection

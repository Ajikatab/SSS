@extends('user.layouts.main')

@section('container')
    <div style="margin-top: 50px; margin-bottom: 20px;">
        <h1 style="margin-bottom: 20px;">Movie Reviews</h1>
        @if (session('success'))
            <div
                style="background-color: #dff0d8; border: 1px solid #3c763d; color: #3c763d; padding: 15px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <div style="display: flex; flex-wrap: wrap;">
            @foreach ($reviews as $review)
                <div
                    style="width: calc(50% - 20px); margin-right: 20px; margin-bottom: 20px; border: 1px solid #ddd; border-radius: 5px; overflow: hidden;">
                    <div style="width: 66.66%; float: left;">
                        <div style="padding: 15px;">
                            <h5 style="margin-bottom: 10px;">{{ $review->username }}</h5>
                            <p style="margin-bottom: 10px;">{{ $review->comment }}</p>
                            <p style="margin-bottom: 10px; color: #777;">{{ $review->created_at->diffForHumans() }}</p>
                            <p style="margin-bottom: 0;">Rating: {{ $review->rating }}</p>
                        </div>
                    </div>
                    <div style="width: 100%;">
                        @if ($review->tmdb_image)
                            <img src="{{ $review->tmdb_image }}" style="width: 100%;" alt="{{ $review->username }}">
                        @else
                            <p style="text-align: center; margin: 10px 0;">No image available</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Form untuk Create Post -->
    <div style="margin-top: 20px;">
        <h2>Review Baru</h2>
        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            <div style="margin-bottom: 20px;">
                <label for="username">Username</label>
                <input type="text" style="width: 100%;" id="username" name="username"
                    value="{{ auth()->user()->username }}" readonly>
            </div>
            <div style="margin-bottom: 20px;">
                <label for="comment">Comment</label>
                <textarea style="width: 100%;" id="comment" name="comment" rows="5" required></textarea>
            </div>
            <div style="margin-bottom: 20px;">
                <label for="rating">Rating</label>
                <input type="number" style="width: 100%;" id="rating" name="rating" min="1" max="5"
                    required>
            </div>
            <div style="margin-bottom: 20px;">
                <label for="image">Image URL</label>
                <input type="url" style="width: 100%;" id="image" name="image" required>
            </div>
            <button type="submit"
                style="background-color: #337ab7; color: #fff; padding: 10px 15px; border: none; cursor: pointer;">Submit</button>
        </form>
    </div>
@endsection


<style>
    .reviews-container {
        display: flex;
        flex-wrap: wrap;
    }

    .review-item {
        width: calc(50% - 20px);
        margin-right: 20px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
    }

    .user-info {
        width: 66.66%;
        float: left;
        padding: 15px;
    }

    .user-info h5 {
        margin-bottom: 10px;
    }

    .user-info p {
        margin-bottom: 10px;
    }

    .review-image img {
        width: 100%;
    }

    .form-group {
        margin-bottom: 20px;
    }
</style>

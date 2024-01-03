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
                        @if ($review->image)
                            <!-- Gunakan $review->tmdb_image untuk mengakses URL gambar -->
                            <img src="{{ $review->image }}" style="width: 150px;" alt="{{ $review->username }}">
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
                <label for="movieSearch">Cari Film</label>
                <input type="text" style="width: 100%;" id="movieSearch" name="movieSearch" required>
                <button type="button" onclick="searchMovies()">Cari</button>
            </div>

            <div id="movieResults"></div>
            <div style="margin-bottom: 20px;">
                <label for="image">Image URL</label>
                <input type="url" style="width: 100%;" id="image" name="image" required>
            </div>
        </form>
    </div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function searchMovies() {
        const searchInput = document.getElementById('movieSearch').value;
        const apiKey =
            '40e32983b0bc5a9d24bce1ff7c45fa1a';

        axios.get(`https://api.themoviedb.org/3/search/movie?api_key=${apiKey}&query=${searchInput}`)
            .then(response => {
                displayMovieResults(response.data.results);
            })
            .catch(error => {
                console.error(error);
            });
    }

    function displayMovieResults(movies) {
        const movieResultsDiv = document.getElementById('movieResults');
        movieResultsDiv.innerHTML = '';

        movies.forEach(movie => {
            const movieDiv = document.createElement('div');
            movieDiv.innerHTML = `
            <img src="https://image.tmdb.org/t/p/w500/${movie.poster_path}" alt="${movie.title}" style="width: 150px; height: auto; display: block; margin: 0 auto;">
            <br>
        `;
            movieResultsDiv.appendChild(movieDiv);
        });

        const submitButton = document.createElement('button');
        submitButton.innerHTML = 'Submit';
        submitButton.onclick = submitReview;
        submitButton.style =
            "background-color: #337ab7; color: #fff; padding: 10px 15px; border: none; cursor: pointer; margin-top: 10px;";
        movieResultsDiv.appendChild(submitButton);
    }

    function updateSelectedMovie(movieId, movieTitle, moviePosterPath) {
        document.getElementById('selectedMovie').value = movieTitle;
        document.getElementById('selectedMovieId').value = movieId;
        document.getElementById('image').value = `https://image.tmdb.org/t/p/w500${moviePosterPath}`;
    }
</script>
<script>
    function updateSelectedMovie(movieId, movieTitle) {
        document.getElementById('selectedMovie').value = movieTitle;
        document.getElementById('selectedMovieId').value = movieId;
    }

    function submitReview() {
        const selectedMovieId = document.getElementById('selectedMovieId').value;
        const comment = document.getElementById('comment').value;
        const rating = document.getElementById('rating').value;
        const image = document.getElementById('image').value;

        document.getElementById('reviewForm').reset();
    }
</script>

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

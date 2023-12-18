@extends('user.layouts.main')

@section('container')
    <h1>Movie Reviews</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Comment</th>
                <th>Review Date</th>
                <th>Rating</th>
                <th>Movie</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $review->username }}</td> <!-- Sesuaikan dengan nama kolom di tabel -->
                    <td>{{ $review->comment }}</td>
                    <td>{{ $review->review_date }}</td>
                    <td>{{ $review->rating }}</td>
                    <td>{{ $review->image }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@extends('layouts.main')

@section('container')
    <h1>Movie Reviews</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Rating</th>
                <th>Comment</th>
                <th>Review Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $review->nama }}</td> <!-- Sesuaikan dengan nama kolom di tabel -->
                    <td>{{ $review->rating }}</td>
                    <td>{{ $review->comment }}</td>
                    <td>{{ $review->review_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

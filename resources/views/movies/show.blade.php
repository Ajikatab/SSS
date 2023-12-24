@extends('layouts.main')

@section('container')
    <div>
        <h1>{{ $movieDetails['title'] }}</h1>
        <p>Sinopsis: {{ $movieDetails['overview'] }}</p>
        <p>Rating: {{ $movieDetails['vote_average'] }}</p>
        <p>Durasi: {{ $movieDetails['runtime'] }} min</p>
        <p>Tahun Rilis: {{ \Carbon\Carbon::parse($movieDetails['release_date'])->format('M d, Y') }}</p>
        <!-- Tambahkan bagian review sesuai kebutuhan -->
    </div>
@endsection

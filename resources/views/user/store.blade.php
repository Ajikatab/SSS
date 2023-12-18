@extends('user.layouts.main')

@section('container')
    <div class='gambar'>
        @foreach ($stores as $store)
            <div class='foto'>
                <img src='img/jam1.jpg'>
                <h2>{{ $store->name }}</h2>
                <p>{{ $store->description }}</p>
                <p>{{ $store->price }}</p> <br>
                <p>{{ $store->stock_quantity }}</p>
                <a href=''>Buy Now</a>
            </div>
        @endforeach
    @endsection

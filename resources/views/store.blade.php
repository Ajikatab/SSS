@extends('layouts.main')

@section('container')
    <div class="">
        <div class='gambar'>
            @foreach ($stores as $store)
                <div class='foto'>
                    @if (isset($store->image))
                        <img src="{{ asset('storage/image-store/' . $store->image) }}" alt="Store Image">
                    @endif
                    <h2>{{ $store->name }}</h2>
                    <p>{{ $store->description }}</p>
                    <p>{{ $store->price }}</p> <br>
                    <p>{{ $store->stock_quantity }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection

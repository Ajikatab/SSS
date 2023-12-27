@extends('layouts.main')

@section('container')
    <!-- SHOP SECTION -->
    <div class="movies" id="movies">
        <h2 class="heading" style="margin-top: 50px;">Shop Products</h2>

        <!-- Movies container  -->
        <div class="movies-container">
            <!-- Loop through your TMDb movie data here -->
            @foreach ($stores as $store)
                <div class="box" data-product-id="{{ $store->id }}">
                    <div class="box-img">
                        @if (isset($store->image))
                            <img src="{{ asset('storage/image-store/' . $store->image) }}" alt="Store Image">
                        @endif
                    </div>
                    <h3>{{ $store->name }}</h3>
                    <span>
                        RP {{ $store->price }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>

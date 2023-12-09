@extends('layouts.genre')

@section('content')
    <!-- Konten pilihan genre -->
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item"><a href="/genre/action">Action</a></li>
                <li class="list-group-item"><a href="/genre/adventure">Adventure</a></li>
                <li class="list-group-item"><a href="/genre/comedy">Comedy</a></li>
                <!-- Tambahkan genre lainnya sesuai kebutuhan -->
            </ul>
        </div>
        <div class="col-md-9">
            <h2>Welcome to the Genre Selection Page</h2>
            <p>Please select a genre from the list to view specific content.</p>
        </div>
    </div>
@endsection

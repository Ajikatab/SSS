@extends('layouts.main')

@section('container')
<div class="W-50 center border rounded px-3 py-3 mx-auto">
    <h1>login</h1>
    <form action="/login" method="POST">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="username" name="username" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3 d-grid">
            <button name="submit" type="submit" class="btn btn-primary">Login</button>
        </div>
    </form> 

</div>

@endsection

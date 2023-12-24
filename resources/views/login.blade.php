@extends('layouts.main')

@section('container')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-5">
                @if (session()->has('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <main class="form-signin">
                    <form action="/login" method="post">
                        @csrf
                        <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
                        <div class="form-floating mt-3">
                            <input type="username" name='username'
                                class="form-control @error('username') is-invalid @enderror" id="username"
                                placeholder="Username" autofocus required value="{{ old('username') }}">
                            <label for="username">Username </label>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mt-3">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="Password" required>
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-check text-start my-3">
                            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Remember me
                            </label>
                        </div>
                        <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
                    </form>
                    <small class="d-block text-center mt-3">Don't have an account? <a href="/register">Make an account
                            now!</a></small>
                </main>
            </div>
        </div>
    </div>
@endsection

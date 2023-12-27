@extends('layouts.main')

@section('container')
    <div style="margin-top: 4rem;">
        @if (session()->has('status'))
            <div
                style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: .25rem; padding: .75rem 1.25rem; margin-bottom: 1rem;">
                {{ session('status') }}
            </div>
        @endif
        <main style="max-width: 20rem; margin: auto;">
            <form action="/login" method="post">
                @csrf
                <h1 style="margin-bottom: 1.5rem; text-align: center; font-size: 1.5rem; font-weight: normal;">Please Login
                </h1>
                <div style="margin-bottom: 1.5rem;">
                    <input type="username" name='username'
                        style="width: 100%; padding: .375rem .75rem; font-size: 1rem; line-height: 1.5; border-radius: .2rem; border: 1px solid #ced4da;"
                        id="username" placeholder="Username" autofocus required value="{{ old('username') }}">
                    @error('username')
                        <div
                            style="color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; border-radius: .25rem; padding: .75rem 1.25rem; margin-top: .5rem;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <input type="password" name="password"
                        style="width: 100%; padding: .375rem .75rem; font-size: 1rem; line-height: 1.5; border-radius: .2rem; border: 1px solid #ced4da;"
                        id="password" placeholder="Password" required>
                    @error('password')
                        <div
                            style="color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; border-radius: .25rem; padding: .75rem 1.25rem; margin-top: .5rem;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <div style="display: flex; align-items: center;">
                        <input type="checkbox" class="form-check-input" style="margin-right: .25rem;" value="remember-me"
                            id="flexCheckDefault">
                        <label for="flexCheckDefault" style="margin-bottom: 0;">Remember me</label>
                    </div>
                </div>
                <button
                    style="width: 100%; padding: .375rem .75rem; font-size: 1rem; line-height: 1.5; border-radius: .2rem; border: none; color: #fff; background-color: #007bff; cursor: pointer;"
                    type="submit">Login</button>
            </form>
            <small style="display: block; text-align: center; margin-top: .75rem;">Don't have an account? <a
                    href="/register" style="color: #007bff; text-decoration: none;">Make an account now!</a></small>
        </main>
    </div>
@endsection

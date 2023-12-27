@extends('layouts.main')

@section('container')
    <div style="margin-top: 4rem;">
        <main style="max-width: 20rem; margin: auto;">
            <form action="/register" method="post">
                @csrf
                <h1 style="margin-bottom: 1.5rem; text-align: center; font-size: 1.5rem; font-weight: normal;">Registration
                    Form</h1>
                <div style="margin-bottom: 1.5rem;">
                    <input type="text" name='username'
                        style="width: 100%; padding: .375rem .75rem; font-size: 1rem; line-height: 1.5; border-radius: .2rem; border: 1px solid #ced4da;"
                        id="username" placeholder="Username" required value="{{ old('username') }}">
                    @error('username')
                        <div
                            style="color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; border-radius: .25rem; padding: .75rem 1.25rem; margin-top: .5rem;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <input type="email" name='email'
                        style="width: 100%; padding: .375rem .75rem; font-size: 1rem; line-height: 1.5; border-radius: .2rem; border: 1px solid #ced4da;"
                        id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                    @error('email')
                        <div
                            style="color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; border-radius: .25rem; padding: .75rem 1.25rem; margin-top: .5rem;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <input type="password" name='password'
                        style="width: 100%; padding: .375rem .75rem; font-size: 1rem; line-height: 1.5; border-radius: .2rem; border: 1px solid #ced4da;"
                        id="password" placeholder="Password" required value="{{ old('password') }}">
                    @error('password')
                        <div
                            style="color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; border-radius: .25rem; padding: .75rem 1.25rem; margin-top: .5rem;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button
                    style="width: 100%; padding: .375rem .75rem; font-size: 1rem; line-height: 1.5; border-radius: .2rem; border: none; color: #fff; background-color: #007bff; cursor: pointer;"
                    type="submit">Register</button>
            </form>
            <small style="display: block; text-align: center; margin-top: .75rem;">Already Registered? <a href="/login"
                    style="color: #007bff; text-decoration: none;">Login now!</a></small>
        </main>
    </div>
@endsection

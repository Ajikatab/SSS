@extends('layouts.main')

@section('container')
    @if (session()->has('status'))
        <div
            style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: .25rem; padding: .75rem 1.25rem; margin-bottom: 1rem;">
            {{ session('status') }}
        </div>
    @endif
    <section class="seclog">
        <div class="form-box">
            <div class="form-value">
                <form action="/login" method="post">
                    @csrf
                    <h2 class="login">Login</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="username" name='username' id="username" autofocus required
                            value="{{ old('username') }}">
                        <label for="">Username</label>
                        @error('username')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" id="password" required>
                        <label for="">Password</label>
                        @error('password')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="forget">

                        <label for="flexCheckDefault"><input type="checkbox" class="form-check-input" value="remember-me"
                                id="flexCheckDefault">Remember me</label>
                    </div>
                    <button type="submit" class="btn-login">Login</button>
                    <div class="register">
                        <p>Don't have a account <a href="/register">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    </div>
@endsection

@extends('layouts.main')

@section('container')
    <section class="seclog">
        <div class="form-box">
            <div class="form-value">
                <form action="/register" method="post">
                    @csrf
                    <h2 class="login">Registration</h2>
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
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name='email' id="email" required value="{{ old('email') }}">
                        <label for="">Email</label>
                        @error('email')
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
                    <button type="submit" class="btn-login">Register</button>
                </form>
                <div class="register">
                    <p>Already Registered? <a href="/login">Login now!</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
  <div class="col-md-5">
    <main class="form-register">
      <form action="/register" method="post">
        @csrf
          <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
        <div class="form-floating">
          <input type="text" name='username' class="form-control rounded-top @error('username') is-invalid @enderror" 
          id="username" placeholder="Username" required value="{{old('username')}}">
          <label for="floatingInput">Username </label>
          @error('username')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="Email" name='email' class="form-control rounded-top @error('username') is-invalid @enderror"
           id="email" placeholder="name@example.com" required value="{{old('email')}}">
          <label for="email">Email Address </label>
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name='password' class="form-control rounded-top @error('password') is-invalid @enderror" 
          id="Password" placeholder="Password" required value="{{old('username')}}">
          <label for="floatingPassword">Password</label>
          @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>
      </form>
      <small class="d-block text-center mt-3">Already Registered? <a href="/login">Login now!</a></small>
    </main>
  </div>
</div>


@endsection
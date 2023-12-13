@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
  <div class="col-md-5">
    <main class="form-signin">
      <form>
        <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
        <div class="form-floating">
          <input type="username" name='username' class="form-control" 
          id="floatingInput" placeholder="Username" required>
          <label for="floatingInput">Username </label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
          <label for="floatingPassword">Password</label>
        </div>
    
        <div class="form-check text-start my-3">
          <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            Remember me
          </label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
      </form>
      <small class="d-block text-center mt-3">don't have an account? <a href="/register">make account now!</a></small>
    </main>
  </div>
</div>


@endsection
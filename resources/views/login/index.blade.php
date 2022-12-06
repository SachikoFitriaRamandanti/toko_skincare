@extends('layouts.main')

@section('container')

</div>
<main class="form-signin w-100 m-auto">
    <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
  <form method="get" action="/login/auth">
    @csrf

    <div class="form-floating">
      <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" autofocus required>
      <label for="email">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
  </form>
  <small class="d-block text-center mt-3">Not registered? <a href="/register">Register Now!</a></small>
</main>

@endsection
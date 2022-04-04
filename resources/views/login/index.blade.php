@extends('layouts.main')
@section('container')
<div class="row justify-content-center">

  @if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

  @endif

  <div class="col-md-4">
    <main class="form-signin">
    <h1 class="h3 mb-3 fw-normal text-center">Form Login</h1>
  <form>
  <div class="form-floating">
    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
    <label for="email">Email address</label>
  </div>
  <div class="form-floating">
    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
    <label for="password">Password</label>
  </div>
  <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  </form>
  <small class="d-block text-center">Belum registrasi? <a href="/registrasi">Registrasi Sekarang</a></small>
  </main>
    </div>
</div>

@endsection
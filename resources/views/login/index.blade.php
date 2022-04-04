@extends('layouts.main')
@section('container')
	<main class="form-signin">
	    <h1 class="h3 mb-3 fw-normal">Form Login</h1>
  <form>
    <div class="form-floating">
      <input type="email" class="form-control" id="email" placeholder="name@example.com" required>
      <label for="email">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" placeholder="Password" required>
      <label for="password">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  </form>
<small>Belum registrasi? <a href="/registrasi">Registrasi Sekarang</a></small>
</main>
@endsection
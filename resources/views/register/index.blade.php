@extends ('layouts.main')
@section('container')
	<div class="row justify-content-center">
		<div class="col-md-4r">
				<main class="form-register">
	    <h1 class="h3 mb-3 fw-normal">Form Registrasi</h1>
  <form>
    <div class="form-floating">
      <input type="text" class="form-control rounded-top" id="name" placeholder="Nama">
      <label for="name">Nama</label>
    </div>
	<div class="form-floating">
      <input type="text" class="form-control" id="username" placeholder="Username">
      <label for="username">Username</label>
    </div>
	<div class="form-floating">
      <input type="email" class="form-control" id="email" placeholder="name@example.com">
      <label for="email">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control rounded-bottom" id="password" placeholder="Password">
      <label for="password">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Registrasi</button>
  </form>
	<small class="d-block text-center">Sudah Registrasi? <a href="/login">Login Disini</a></small>
	</main>
		</div>
	</div>

@endsection
@extends ('layouts.main')
@section('container')
	<div class="row justify-content-center mt-5">
		<div class="col-md-5">
				<main class="form-register">
	    <h1 class="h3 mb-3 fw-normal text-center">Form Registrasi</h1>
  <form action="/registrasi" method="post">

    @csrf
    <div class="form-floating">
      <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Nama" required value="{{ old('name') }}">
      <label for="name">Nama</label>
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
	<div class="form-floating">
      <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
      <label for="username">Username</label>
      @error('username')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
	<div class="form-floating">
      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
      <label for="email">Email address</label>
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
      <label for="password">Password</label>
      @error('password')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Registrasi</button>
  </form>
	<small class="d-block text-center mt-3">Sudah Registrasi? <a href="/login">Login Disini</a></small>
	</main>
		</div>
	</div>

@endsection
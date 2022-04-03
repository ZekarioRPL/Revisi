@extends('Dashboard.DashboardMain')

@section('container')

<div class="col-lg-8">

        <form action="#" method="post" enctype="multipart/form-data">
            @method('put')
                @csrf
                
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="#">
                @error('#')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>

@endsection
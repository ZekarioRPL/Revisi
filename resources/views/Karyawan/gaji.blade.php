@extends('Dashboard.DashboardMain')

@section('container')


<!-- total gaji -->
<div class="col-md-3 col-lg-3 col-xl-3 col-xs-12 col-sm-12 mb-4" data-aos="fade-up" data-aos-duration="500">
    <a href="#" style="text-decoration:none;">
    <div class="card border-left-primary shadow-sm h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Saldo</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        RP.
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-download fa-2x text-primary"></i>
                </div>
            </div>
        </div>
    </div>
    </a>
</div>
<!-- code khusus -->
<div class="col-lg-3">
        <form action="#" method="post" enctype="multipart/form-data">
            @method('put')
                @csrf
                
              <div class="mb-3">
                <label for="code" class="form-label">Code Khusus</label>
                <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" required autofocus value="#">
                @error('#')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
                @enderror
              </div>
        </form>
</div>

<!-- history gaji -->
<hr>
<div class="col-lg-10">

      <h2>History</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
                <th scope="col">#</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Kondisi</th>
              <th scope="col">Code</th>
              <th scope="col">Jumlah</th>
            </tr>
          </thead>
          <tbody>
            
            <tr>
              <td>1,015</td>
              <td>random</td>
              <td>tabular</td>
              <td>information</td>
              <td>text</td>
            </tr>
          </tbody>
        </table>
</div>
@endsection
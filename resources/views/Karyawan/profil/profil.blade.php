@extends('Dashboard.DashboardMain')

@section('container')
<button type="button" class="btn btn-primary">Tambah</button>
<a href="#" class="btn btn-primary mb-4">Edit</a>

<div class="card mb-3 p-3" style="max-width: 90%;">
  <div class="row g-0">
    <div class="col-md-5 p-3">
      <img src="/img/king.jpg" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-6">
      <div class="card-body">
        <h3>Data Diri</h3>
        <table class="table table-striped" >
            <tr>
                <th>Nama Lengkap</th>
                    <th>:</th>
            </tr>

            <tr>
                <th>Jenis Kelamin</th>
                    <th>:</th>
            </tr>

            <tr>
                <th>Tempat & Tanggal Lahir</th>
                <th>:</th>
            </tr>

            <tr>
                <th>No.Identitas</th>
                <th>:</th>
            </tr>
            
            <tr>
                <th>Alamat</th>
                <th>:</th>
            </tr>

            <tr>
                <th>Email</th>
                <th>:</th>
            </tr>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
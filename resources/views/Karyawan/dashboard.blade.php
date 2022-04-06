@extends('Dashboard.DashboardMain')

@section('container')

<!-- alert -->
@if(session()->has('bisa'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('bisa') }}
  </div>
@endif
<!-- /alert -->

<!-- contetent edit -->
<div name="Edit">
  <form action="/profils/{{ $user->id }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    
    <div class="row">
        <div class="col-lg-12">
          <div class="panel well">
            <a href="/profils">
              <button class="btn btn-labeled btn-primary" type="button">
                <span class="btn-label"><i class="icon-action-undo"></i>
              </span><b>Kembali</b></button>
            </a>
            <div class="panel-body">
              <div class="row">
    
                <div class="col-lg-4 text-center">
                    <img class="img-thumbnail img-circle thumb250" src="/img/king.jpg">
                </div>
    
                <div class="col-lg-8">
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Nama</label>
                    <div class="col-lg-8">
                      <input class="form-control" type="text" name="name" value="" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter" autofocus>
                    </div>
                  </div>
    
                  <!-- <div class="form-group">
                    <label class="col-lg-3 control-label">E-mail</label>
                    <div class="col-lg-8">
                      <input class="form-control" type="email" name="email" value="" required>
                    </div>
                  </div> -->
    
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Jenis Kelamin</label>
                    <div class="col-lg-8">
                      <input class="form-control" type="text" name="jenis_kelamin" value="" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter" autofocus>
                    </div>
                  </div>
    
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Alamat</label>
                    <div class="col-lg-8">
                      <input class="form-control" type="text" name="alamat" value="" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter" autofocus>
                    </div>
                  </div>

                  <!-- <div class="form-group">
                    <label class="col-lg-3 control-label">Tanggal Lahir</label>
                    <div class="col-lg-8">
                      <input class="form-control" type="text" name="Nama" value="" required pattern="[a-zA-Z0-9]+.{0,}" title="Minimal 1 Karakter" autofocus>
                    </div>
                  </div> -->
    
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Foto
                      <br><small>Boleh di Kosongkan</small>
                    </label>
                    <div class="col-lg-8">
                      <input class="form-control" type="file" name="Foto" value="" accept="image/*">
                    </div>
                  </div>
    
                  <div class="form-group">
                    <label class="col-lg-3 control-label">Username</label>
                    <div class="col-lg-8">
                      <input class="form-control" type="text" name="username" value="" required pattern="[a-zA-Z0-9]+.{5,}" title="Minimal 6 Karakter">
                    </div>
                  </div>
    
                  <!-- GANTI PASSWORD -->
                  <!-- <div class="form-group">
                    <label class="col-lg-3 control-label">Password</label>
                    <div class="col-lg-8">
                      <input class="form-control" type="password" name="Password" placeholder="Isi Jika Ingin Ganti Password" value="" pattern=".{5,}" title="Minimal 6 Karakter">
                    </div>
                  </div> -->
                  <!-- /GANTI PASSWORD -->
    
                  <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="row">
                      <div class="col-md-2">
                        <button type="submit" class="btn btn-block btn-info btn">
                          <i class="fa fa-save"></i> <b>Simpan</b>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
    
                </div>
            </div>
          </div>
        </div>
    </div>

  </form>
</div>
<!-- / content edit -->

@endsection
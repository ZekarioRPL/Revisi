@extends('Dashboard.DashboardMain')
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="assets/css/lib/select2/select2.min.css" rel="stylesheet">
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
@section('container')

<!-- content -->
<div class="content-wrap">
      <div class="main">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-8 p-r-0 title-margin-right">
                      <div class="page-header">
                          <div class="page-title">
                              <h1></h1>
                          </div>
                      </div>
                  </div>
                  <!-- /# column -->
                  <div class="col-lg-4 p-l-0 title-margin-left">
                      <div class="page-header">
                          <div class="page-title">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                  <li class="breadcrumb-item active">{{ $title }}</li>
                              </ol>
                          </div>
                      </div>
                  </div>
                  <!-- /# column -->
              </div>
              <!-- /# row -->
              <section id="main-content">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="card">
                              <div class="card-body">
                                  <div class="form-validation">
                                      <form class="form-valide" action="/edit/profil-perusahaan" method="post" enctype="multipart/form-data">
                                        @csrf
                                          <div class="form-group row mb-2">
                                              <label class="col-lg-4 col-form-label" for="val-image">Image <span class="text-danger">*</span></label>
                                              <div class="col-lg-8">
                                                  <input type="hidden" name="oldImage">
                                                  @if ($data->image)
                                                  <img src="{{ asset('storage/' . $data->image) }}" class="img-preview img-fluid mb-3 col-sm-4 d-block">
                                                  @else
                                                  <img class="img-preview img-fluid mb-3 col-sm-4">
                                                  @endif

                                                  <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">

                                                  @error('image')
                                                    <div class="invalid-feedback">
                                                     {{ $message }}
                                                     </div>
                                                 @enderror
                                              </div>
                                          </div>
                                          <div class="form-group row mb-2">
                                              <label class="col-lg-4 col-form-label" for="val-name">Nama Perusahaan <span class="text-danger">*</span></label>
                                              <div class="col-lg-8">
                                                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="val-name" name="nama_perusahaan" placeholder="Enter a username.." value="{{ $data->nama_perusahaan }}">
                                                  @error('name')
                                                    <div class="invalid-feedback">
                                                     {{ $message }}
                                                     </div>
                                                 @enderror
                                              </div>
                                          </div>
                                          <div class="form-group row mb-2">
                                              <label class="col-lg-4 col-form-label" for="kontak">Kontak Perusahaan <span class="text-danger">*</span></label>
                                              <div class="col-lg-8">
                                                  <input type="text" class="form-control @error('kontak') is-invalid @enderror" id="kontak" name="kontak" placeholder="Enter your kontak.." value="{{ $data->kontak }}">
                                                  @error('kontak')
                                                    <div class="invalid-feedback">
                                                     {{ $message }}
                                                     </div>
                                                 @enderror
                                              </div>
                                          </div>
                                          <div class="form-group row mb-2">
                                              <label class="col-lg-4 col-form-label" for="val-email">Email Perusahaan <span class="text-danger">*</span></label>
                                              <div class="col-lg-8">
                                                  <input type="text" class="form-control @error('email') is-invalid @enderror" id="val-email" name="email" placeholder="Your valid email.." value="{{ $data->email }}">
                                              </div>
                                          </div>
                                          <div class="form-group row mb-2">
                                              <label class="col-lg-4 col-form-label" for="val-suggestions">Alamat Perusahaan <span class="text-danger">*</span></label>
                                              <div class="col-lg-8">
                                                  <textarea class="form-control @error('alamat') is-invalid @enderror" id="val-suggestions" name="alamat" rows="5" placeholder="Dimana alamatmu?">{{ $data->alamat }}</textarea>
                                              </div>
                                          </div>
                                          <div class="form-group row mb-2">
                                              <label class="col-lg-4 col-form-label" for="bidang_perusahaan">Bidang Perusahaan <span class="text-danger">*</span></label>
                                              <div class="col-lg-6">
                                                <input type="text" class="form-control @error('bidang_perusahaan') is-invalid @enderror" id="bidang_perusahaan" name="bidang_perusahaan" placeholder="Enter a Jabatan.." value="{{ $data->bidang_perusahaan }}">
                                              </div>
                                          </div>
                                          <div class="form-group row mb-2">
                                              <label class="col-lg-4 col-form-label"><a data-toggle="modal" data-target="#modal-terms" href="#">Terms &amp; Conditions</a> <span class="text-danger">*</span></label>
                                              <div class="col-lg-8">
                                                  <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                                      <input type="checkbox" class="css-control-input" id="val-terms" name="val-terms" value="1">
                                                      <span class="css-control-indicator"></span> I agree to the terms
                                                  </label>
                                              </div>
                                          </div>
                                          <div class="form-group row mb-2">
                                              <div class="col-lg-8 ml-auto">
                                                  <button type="submit" class="btn btn-primary">Submit</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="footer">
                              <p>2018 © Admin Board. - <a href="#">example.com</a></p>
                          </div>
                      </div>
                  </div>
              </section>
          </div>
      </div>
</div>
<!-- /end - content -->


<!-- javascript -->
    <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    
    <!-- bootstrap -->
    <!-- Select2 -->
    <script src="assets/js/lib/select2/select2.full.min.js"></script>
    <script src="assets/js/lib/form-validation/jquery.validate.min.js"></script>
    <script src="assets/js/lib/form-validation/jquery.validate-init.js"></script>
    <script src="assets/js/lib/bootstrap.min.js"></script><script src="assets/js/scripts.js"></script>
    <!-- scripit init-->

    {{-- Our Javascript  --}}
    <script>
        function previewImage(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
<!-- /end - javascript -->
@endsection
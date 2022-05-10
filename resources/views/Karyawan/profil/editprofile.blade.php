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
                                      <form class="form-valide" action="/update" method="post" enctype="multipart/form-data">
                                        @csrf
                                          <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="val-image">Image <span class="text-danger">*</span></label>
                                              <div class="col-lg-8">
                                                  <input type="file" class="form-control @error('image') is-invalid @enderror" id="val-image" name="image" placeholder="Enter a username..">

                                                  @error('image')
                                                    <div class="invalid-feedback">
                                                     {{ $message }}
                                                     </div>
                                                 @enderror
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="val-username">Username <span class="text-danger">*</span></label>
                                              <div class="col-lg-8">
                                                  <input type="text" class="form-control" id="val-username" name="username" placeholder="Enter a username.." value="{{ auth()->user()->username }}">
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="val-name">Name <span class="text-danger">*</span></label>
                                              <div class="col-lg-8">
                                                  <input type="text" class="form-control" id="val-name" name="name" placeholder="Enter a username.." value="{{ auth()->user()->name }}">
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span></label>
                                              <div class="col-lg-8">
                                                  <input type="text" class="form-control" id="val-email" name="email" placeholder="Your valid email.." value="{{ auth()->user()->email }}">
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="val-password">Password <span class="text-danger">*</span></label>
                                              <div class="col-lg-8">
                                                  <input type="password" class="form-control" id="val-password" name="password" placeholder="Choose a safe one..">
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="val-confirm-password">Confirm Password <span class="text-danger">*</span></label>
                                              <div class="col-lg-8">
                                                  <input type="password" class="form-control" id="val-confirm-password" name="confirm-password" placeholder="..and confirm it!">
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="val-select2">Gender <span class="text-danger">*</span></label>
                                              <div class="col-lg-8">
                                                  @if (auth()->user()->jenis_kelamin)
                                                  <input type="text" class="form-control" id="val-select2" name="jenis_kelamin" placeholder="Enter a Gender.." value="{{ auth()->user()->jenis_kelamin }}">
                                                  @else
                                                  <select class="js-select2 form-control" id="val-select2" name="jenis_kelamin" style="width: 100%;" data-placeholder="Choose one.." >
                                                      <option>Select!</option>
                                                      <option value="Laki-Laki">Laki-Laki</option>
                                                      <option value="Perempuan">Perempuan</option>
                                                  </select>                                                      
                                                  @endif
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="val-suggestions">Alamat <span class="text-danger">*</span></label>
                                              <div class="col-lg-8">
                                                  <textarea class="form-control" id="val-suggestions" name="alamat" rows="5" placeholder="Dimana alamatmu?">{{ auth()->user()->alamat }}</textarea>
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="val-jabatan">Jabatan <span class="text-danger">*</span></label>
                                              <div class="col-lg-6">
                                                @if (auth()->user()->jabatan)
                                                <input type="text" class="form-control" id="val-jabatan" name="jabatan" placeholder="Enter a Jabatan.." value="{{ auth()->user()->jabatan }}">
                                                @else                                                    
                                                <select class="form-control" id="val-skill" name="jabatan">
                                                    <option>Please select</option>
                                                    <option value="Manager">Manager</option>
                                                    <option value="Web Developer">Web Developer</option>
                                                    <option value="Customer Service">Customer Service</option>
                                                    <option value="Pemberanu">Pemberani</option>
                                                </select>
                                                @endif
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="val-currency">Tanggal Lahir <span class="text-danger">*</span></label>
                                              <div class="col-lg-6">
                                                  <input type="date" class="form-control" id="val-currency" name="tanggal_lahir" value="{{ auth()->user()->tanggal_lahir }}">
                                              </div>
                                        
                                          <div class="form-group row">
                                              <label class="col-lg-4 col-form-label"><a data-toggle="modal" data-target="#modal-terms" href="#">Terms &amp; Conditions</a> <span class="text-danger">*</span></label>
                                              <div class="col-lg-8">
                                                  <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                                      <input type="checkbox" class="css-control-input" id="val-terms" name="val-terms" value="1">
                                                      <span class="css-control-indicator"></span> I agree to the terms
                                                  </label>
                                              </div>
                                          </div>
                                          <div class="form-group row">
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
<!-- /end - javascript -->
@endsection
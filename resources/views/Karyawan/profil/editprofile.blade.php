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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <style>
        #ip:hover{
            cursor: pointer;
        }
    </style>
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
                                                  <input type="hidden" name="oldImage" value="{{ auth()->user()->image }}">
                                                  @if (auth()->user()->image)
                                                  <img src="{{ asset('storage/' . auth()->user()->image) }}" class="img-preview img-fluid mb-3 col-sm-4 d-block">
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
                                          <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="val-username">Username <span class="text-danger">*</span></label>
                                              <div class="col-lg-8">
                                                  <input type="text" class="form-control @error('username') is-invalid @enderror" id="val-username" name="username" placeholder="Enter a username.." value="{{ auth()->user()->username }}">
                                                  @error('username')
                                                  <div class="invalid-feedback">
                                                   {{ $message }}
                                                   </div>
                                               @enderror
                                                </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="val-name">Name <span class="text-danger">*</span></label>
                                              <div class="col-lg-8">
                                                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="val-name" name="name" placeholder="Enter a username.." value="{{ auth()->user()->name }}">
                                                  @error('name')
                                                  <div class="invalid-feedback">
                                                   {{ $message }}
                                                   </div>
                                               @enderror
                                                </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span></label>
                                              <div class="col-lg-8">
                                                  <input type="text" class="form-control @error('email') is-invalid @enderror" id="val-email" name="email" placeholder="Your valid email.." value="{{ auth()->user()->email }}">
                                                  @error('image')
                                                  <div class="invalid-feedback">
                                                   {{ $message }}
                                                   </div>
                                               @enderror
                                                </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="inputPassword">Password <span class="text-danger">*</span></label>
                                              <div class="col-lg-8 d-flex">
                                                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" name="password" placeholder="Choose a safe one..">
                                                  <div class="fs-4 ml-2 mt-2"  onclick="myFunction()" id="ip"> <i class="bi bi-eye-fill"></i></div>
                                                  @error('image')
                                                  <div class="invalid-feedback">
                                                   {{ $message }}
                                                   </div>
                                               @enderror
                                                </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="inputPassword2">Confirm Password <span class="text-danger">*</span></label>
                                              <div class="col-lg-8 d-flex">
                                                  <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="inputPassword2" name="confirm_password" placeholder="..and confirm it!">
                                                  <div class="fs-4 ml-2 mt-2"  onclick="myFunction1()" id="ip"> <i class="bi bi-eye-fill"></i></div>
                                                  
                                                  @error('image')
                                                  <div class="invalid-feedback">
                                                   {{ $message }}
                                                   </div>
                                               @enderror
                                                </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="val-select2">Gender <span class="text-danger">*</span></label>
                                              <div class="col-lg-8">
                                                  @if (auth()->user()->jenis_kelamin = "Laki-Laki")
                                                  <select class="js-select2 form-control @error('jenis_kelamin') is-invalid @enderror" id="val-select2" name="jenis_kelamin" style="width: 100%;" data-placeholder="Choose one.." >
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                                    @elseif(auth()->user()->jenis_kelamin = "Perempuan") 
                                                    <select class="js-select2 form-control @error('jenis_kelamin') is-invalid @enderror" id="val-select2" name="jenis_kelamin" style="width: 100%;" data-placeholder="Choose one.." >
                                                        <option value="Perempuan">Perempuan</option>
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                    </select>  
                                                    
                                                  @else
                                                  <select class="js-select2 form-control @error('jenis_kelamin') is-invalid @enderror" id="val-select2" name="jenis_kelamin" style="width: 100%;" data-placeholder="Choose one.." >
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
                                                  <textarea class="form-control @error('alamat') is-invalid @enderror" id="val-suggestions" name="alamat" rows="5" placeholder="Dimana alamatmu?">{{ auth()->user()->alamat }}</textarea>
                                                  @error('image')
                                                  <div class="invalid-feedback">
                                                   {{ $message }}
                                                   </div>
                                               @enderror
                                                </div>
                                          </div>
                                          <!-- <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="val-jabatan">Jabatan <span class="text-danger">*</span></label>
                                              <div class="col-lg-6">
                                                {{-- @if (auth()->user()->jabatan)
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="val-jabatan" name="jabatan" placeholder="Enter a Jabatan.." value="{{ auth()->user()->jabatan }}">
                                                @else                                                     --}}
                                                <select class="form-control @error('jabatan') is-invalid @enderror" id="val-skill" name="jabatan">
                                                    <option>Please select</option>
                                                    <option value="Manager">Manager</option>
                                                    <option value="Web Developer">Web Developer</option>
                                                    <option value="Customer Service">Customer Service</option>
                                                    <option value="Pemberanu">Pemberani</option>
                                                </select>
                                                {{-- @endif --}}
                                              </div>
                                          </div> -->
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="jabatan">Jabatan<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="js-nama_Karyawan form-control" id="jabatan" name="jabatan" data-placeholder="Choose one.." required>
                                                    <option></option>
                                                    @foreach( $jabatans as $jabatan)
                                                        <option value="{{ $jabatan->id }}">{{ $jabatan->jabatan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                          <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="val-currency">Tanggal Lahir <span class="text-danger">*</span></label>
                                              <div class="col-lg-6">
                                                  <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="val-currency" name="tanggal_lahir" value="{{ auth()->user()->tanggal_lahir }}">
                                                  @error('tanggal_lahir')
                                                  <div class="invalid-feedback">
                                                   {{ $message }}
                                                   </div>
                                               @enderror
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="shift">Pilih Shift Kerja <span class="text-danger">*</span></label>
                                                    <div class="col-lg-6">
                                                        <select class="js-nama_Karyawan form-control" id="shift" name="shift" style="margin-left : 7px" data-placeholder="Choose one.." required>
                                                            <option></option>
                                                            @foreach( $shifts as $shift)
                                                              <option value="{{ $shift->id }}">{{ $shift->shift_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
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
    {{-- For menampilkan pw --}}
    <script>
        function myFunction() {
            var x = document.getElementById("inputPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    {{-- to see confirm pw --}}
    <script>
        function myFunction1() {
            var x = document.getElementById("inputPassword2");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
<!-- /end - javascript -->
@endsection
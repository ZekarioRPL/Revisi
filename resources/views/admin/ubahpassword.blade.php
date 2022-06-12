@extends('Dashboard.DashboardMain')

    <?php use App\Models\ProfilPerusahaan;

    
        $data = ProfilPerusahaan::where('id', 1)->first();
    
    ?>
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
        #df:hover{
            cursor: pointer;
        }
        #dw:hover{
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
              @if (session()->has('success'))
                          <div class="alert alert-success alert-dismissible fade show text-light" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
              <!-- /# row -->
              <section id="main-content">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="card">
                              <div class="card-body">
                                  <div class="form-validation">
                                      <form class="form-valide" action="/ubah-pw/{{ $dt->id }}" method="post">
                                        @csrf
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-4 col-form-label" for="Email">Email <span class="text-danger">*</span></label>
                                            <div class="col-lg-8 d-flex">
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="Email" name="email" placeholder="Insert Your email" value="{{ $dt->email }}">
                                                @error('email')
                                                <div class="invalid-feedback">
                                                 {{ $message }}
                                                 </div>
                                             @enderror
                                              </div>
                                        </div>
                                          <div class="form-group row  mb-3">
                                              <label class="col-lg-4 col-form-label" for="inputPassword">Password <span class="text-danger">*</span></label>
                                              <div class="col-lg-8 d-flex">
                                                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" name="password" placeholder="Choose a safe one..">
                                                  <div class="fs-4 ms-2 mt-2"  onclick="myFunction()" id="ip"> <i class="bi bi-eye-fill"></i></div>
                                                  @error('password')
                                                  <div class="invalid-feedback">
                                                   {{ $message }}
                                                   </div>
                                               @enderror
                                                </div>
                                          </div>
                                          <div class="form-group row mb-3">
                                              <label class="col-lg-4 col-form-label" for="inputPassword2">Confirm Password <span class="text-danger">*</span></label>
                                              <div class="col-lg-8 d-flex">
                                                  <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="inputPassword2" name="confirm_password" placeholder="..and confirm it!">
                                                  <div class="fs-4 ms-2 mt-2"  onclick="myFunction1()" id="ip"> <i class="bi bi-eye-fill"></i></div>
                                                  
                                                  @error('confirm_password')
                                                  <div class="invalid-feedback">
                                                   {{ $message }}
                                                   </div>
                                               @enderror
                                                </div>
                                          </div>
                                          <div class="form-group row mb-3">
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
                                          <div class="form-group row mb-3">
                                              <label class="col-lg-4 col-form-label"><a data-toggle="modal" data-target="#modal-terms" href="#">Terms &amp; Conditions</a> <span class="text-danger">*</span></label>
                                              <div class="col-lg-8">
                                                  <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                                      <input type="checkbox" class="css-control-input" id="val-terms" name="val-terms" value="1">
                                                      <span class="css-control-indicator"></span> I agree to the terms
                                                  </label>
                                              </div>
                                          </div>
                                          <div class="form-group row mb-3  ">
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
        function myFunction1() {
            var x = document.getElementById("inputPassword2");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        function dropdown(){
            
            $("#dropdown1").html(`
                <select class="form-control @error('jabatan') is-invalid @enderror" id="val-skill" name="jabatan" id="jbtn-dd">
                                                    <option>Please select</option>
                                                    <option value="Manager">Manager</option>
                                                    <option value="Web Developer">Web Developer</option>
                                                    <option value="Customer Service">Customer Service</option>
                                                    <option value="Pemberanu">Marketing</option>
                                                </select> 
                                                <i class="bi bi-caret-down-fill mt-2 ms-2 fs-4" id="dw" onclick="dropdown1()"></i> 
                                                `)
                                                $('#dropdown1')[0].click('#val-skill',function(){});
        }
        function dropdown1(){
        $("#dropdown1").on('click', '#dw', function(){
            $("#val-skill").hide()
            $("#dw").hide()
            $("#dropdown1").html(`                                                <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="dropdown1" name="jabatan" placeholder="Enter a Jabatan.." value="{{ $dt->jabatan }}">
                                                <i class="bi bi-caret-left-fill mt-2 ms-2 fs-4" id="df" onclick="dropdown()"></i>`)
        })
    }
    </script>
    {{-- to see confirm pw --}}
    <script>        
           

        
    </script>
<!-- /end - javascript -->
@endsection
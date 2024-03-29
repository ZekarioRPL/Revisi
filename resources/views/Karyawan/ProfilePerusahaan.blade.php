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
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">
    <!--Themes Jquery Bar Rating-->
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
	
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
@section('container')
<!-- #### -->
<div class="main">
    <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                      <div class="page-title">
                      </div>
                    </div>
                  </div>
                  <!-- /# column -->
                  <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                      <div class="page-title">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item">
                            <a href="#">Dashboard</a>
                          </li>
                          <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                      </div>
                    </div>
                  </div>
                  <!-- /# column -->
                </div>
                <!-- /# row -->
    </div>
</div>
<!-- /end - #### -->
@if ($message = Session::get('bisa'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Selamat! </strong>{{ $message }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
<!-- Profile -->
<div class="content-wrap">
    <div class="main">
      <div class="container-fluid">
        
          <!-- /# column -->
        </div>
        <!-- /# row -->
        
        <section id="main-content">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="user-profile">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="user-photo m-b-30">
                          <img class="img-fluid" src="{{ asset('storage/' . $data->image) }}" alt="" />
                        </div>
                      </div>
                      <div class="col-lg-8">
                        <div class="user-profile-name">{{ $data->nama_perusahaan }}</div>
                        <div class="user-Location">
                          <i class="ti-location-pin"></i>Indonesia, Ponorogo</div>
                        <div class="user-job-title">{{ $data->bidang_perusahaan }}</div>
                        @can('admin')
                        <div class="user-job-title">
                          <a href="/edit/profil-perusahaan" class="btn btn-primary m-b-10">Edit</a>
                        </div>
                        @endcan
                        <!-- <div class="user-send-message">
                          <button class="btn btn-primary btn-addon" type="button">
                            <i class="ti-email"></i>Send Message</button>
                        </div> -->
                        <div class="custom-tab user-profile-tab">
                          <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                              <a href="#1" aria-controls="1" role="tab" data-toggle="tab">About</a>
                            </li>
                          </ul>
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="1">
                              <div class="contact-information">
                                <h4>Contact information</h4>
                                <div class="address-content">
                                  <span class="contact-title">Contact :</span>
                                  <span class="mail-address">{{ $data->kontak }}</span>
                                </div>
                                <div class="address-content">
                                  <span class="contact-title">Address :</span>
                                  <span class="mail-address">{{ $data->alamat }}</span>
                                </div>
                                <div class="email-content">
                                  <span class="contact-title">Email :</span>
                                  <span class="contact-email">{{ $data->email }}</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card"> 
                                <div class="bootstrap-data-table-panel">
                                @can('admin')
                                    <div>
                                        <a class="btn btn-primary border-0 shadow-none" href="/shifts/create" role="button"><strong>Tambah Shift</strong>
                                        </a>
                                    </div>
                                @endcan
                                    <br>
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Shift</th>
                                                    <th>Jam Masuk</th>
                                                    <th>Jam Pulang</th>
                                                    @can('admin')
                                                    <th>Action</th>
                                                    @endcan
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach( $shifts as $shift )
                                              <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $shift->shift_name }}</td>
                                                <td>{{ $shift->time_in }}</td>
                                                <td >{{ $shift->time_out }}</td>
                                                @can('admin')
                                                <td>
                                                <form action="/shifts/{{ $shift->id }}" method="post" class="d-inline">
                                                  @method('DELETE')
                                                  @csrf
                                                  <button class="badge bg-danger border-0" onclick="return confirm(' Are Yout Sure Delete ')">Delete</button>
                                                </form>
                                              </td>
                                              @endcan
                                              </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                </section>
          <section id="main-content">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card"> 
                                <div class="bootstrap-data-table-panel">
                                @can('admin')
                                    <div>
                                        <a class="btn btn-primary border-0 shadow-none" href="/jabatan/create" role="button"><strong>Tambah Jabatan</strong>
                                        </a>
                                    </div>
                                @endcan
                                    <br>
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>jabatan</th>
                                                    <th>Gaji / Bulan</th>
                                                    @can('admin')
                                                    <th>Action</th>
                                                    @endcan
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach( $jabatans as $jabatan )
                                              <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $jabatan->jabatan }}</td>
                                                <td >{{ $jabatan->gaji }}</td>
                                                @can('admin')
                                                <td>
                                                <form action="/jabatan/{{ $jabatan->id }}" method="post" class="d-inline">
                                                  @method('DELETE')
                                                  @csrf
                                                  <button class="badge bg-danger border-0" onclick="return confirm(' Are Yout Sure Delete ')">Delete</button>
                                                </form>
                                              </td>
                                              @endcan
                                              </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                </section>

          <div class="row">
            <div class="col-lg-12">
              <div class="footer">
                <p>2018 © Admin Board. -
                  <a href="#">example.com</a>
                </p>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
</div>
<!-- /end - Profile -->


<!-- javascript -->
    <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    <!-- scripit init-->
    <script src="assets/js/lib/bootstrap.min.js"></script><script src="assets/js/scripts.js"></script>
    
    <!-- bootstrap -->


    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.algeria.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.argentina.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.brazil.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.france.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.germany.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.greece.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.iran.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.iraq.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.russia.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.tunisia.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.europe.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.usa.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/country/jquery.vmap.turkey.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/vector-map/vector.init.js"></script>
    <!-- scripit init-->
<!-- /end - javascript -->
@endsection
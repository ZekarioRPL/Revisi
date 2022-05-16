@extends('Dashboard.DashboardMain')
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
    <link href="assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
@section('container')

<div class="content-wrap">
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
            @if ($message = Session::get('bisa'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Selamat! </strong>{{ $message }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
          
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
                          @if (auth()->user()->image)
                          <img class="img-fluid" src="{{ asset('storage/' . auth()->user()->image) }}" alt="" />
                          @else
                          <img class="img-fluid" src="assets/images/user-profile.jpg" alt="" />
                          @endif
                        </div>
                      </div>
                      <div class="col-lg-8">
                        <div class="user-profile-name">{{ auth()->user()->name }}</div>
                        <div class="user-job-title">
                          @if (auth()->user()->jabatan)
                                      {{ auth()->user()->jabatan }}
                                    @else
                                       <small>Tambahkan Jabatan</small> 
                                    @endif
                        </div>
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
                                  <span class="contact-title">Address:</span>
                                  <span class="mail-address">
                                    @if (auth()->user()->alamat)
                                      {{ auth()->user()->alamat }}
                                    @else
                                       <small>Please input your address!</small> 
                                    @endif
                                  </span>
                                </div>
                                <div class="email-content">
                                  <span class="contact-title">Email:</span>
                                  <span class="contact-email">{{ auth()->user()->email }}</span>
                                </div>
                              </div>
                              <div class="basic-information">
                                <h4>Basic information</h4>
                                <div class="birthday-content">
                                  <span class="contact-title">Birthday :</span>
                                  <span class="birth-date">
                                    @if (auth()->user()->tanggal_lahir)
                                      {{ auth()->user()->tanggal_lahir }}
                                    @else
                                       <small>Not Inputable!</small> 
                                    @endif
                                </span>
                                </div>
                                <div class="gender-content">
                                  <span class="contact-title">Gender :</span>
                                  <span class="gender">
                                    @if (auth()->user()->jenis_kelamin)
                                      {{ auth()->user()->jenis_kelamin }}
                                    @else
                                       <small>Not Inputable!</small> 
                                    @endif
                                  </span>
                                </div>
                                <div class="gender-content">
                                  <span class="contact-title">Shift :</span>
                                  <span class="shift">
                                    @if (auth()->user()->shift_id)
                                      {{ $shift->shift->shift_name }}
                                    @else
                                       <small>Not Inputable!</small> 
                                    @endif
                                  </span>
                                </div>
                              </div>
                              <div class="basic-information">
                                <h4>Kehadiran</h4>
                                <div class="birthday-content">
                                  <span class="contact-title">Hadir :</span>
                                  <span class="gender">00</span>
                                </div>
                                <a href="/edit" class="btn btn-primary">Edit</a>
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


<!-- javascript -->
    <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- bootstrap -->

    <script src="assets/js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="assets/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="assets/js/lib/calendar-2/pignose.init.js"></script>


    <script src="assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/lib/weather/weather-init.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="assets/js/lib/chartist/chartist.min.js"></script>
    <script src="assets/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="assets/js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <!-- scripit init-->
    <script src="assets/js/dashboard2.js"></script>
<!-- /end - javascript -->
@endsection
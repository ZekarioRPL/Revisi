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
                                <h1>Hello, <span>Welcome Here, <strong>{{ auth()->user()->name }}</strong></span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                @if ($message = Session::get('tidakbisa'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf! </strong>{{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if ($message = Session::get('bisa'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat! </strong>{{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        @if(auth()->user()->level == 'bendahara')
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-money color-success border-success"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Pembayaran</div>
                                        <div class="stat-digit">
                                            <a href="/pembayaran" class="btn btn-success">Bayar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-money color-success border-success"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Menu Gaji</div>
                                        <div class="stat-digit">
                                            <a href="/gaji" class="btn btn-success">GAJI</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">                        
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i>
                                        </div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Menu Profile</div>
                                            <div class="stat-digit">
                                                <a href="/profils" class="btn btn-Primary" >Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        @endif
                        @can('karyawan')
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-layout-grid2 color-warning border-warning"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Absen Masuk</div>
                                        <div class="stat-digit">
                                            <a href="/absensi" class="btn btn-warning" >Masuk</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-link color-danger border-danger"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Absen Keluar</div>
                                        <div class="stat-digit">
                                            <a href="/keluar" class="btn btn-Danger" >Keluar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endcan
                        @can('admin')
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-link color-dark border-dark"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Data Absen</div>
                                        <div class="stat-digit">
                                            <a href="/absen" class="btn btn-dark" >Absensi</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endcan
                    </div>

                    <div class="row">
                        <!-- colaborator -->
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card bg-primary">
                                        <div class="weather-widget">
                                        <div class="stat-text">Colaborator</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="testimonial-widget-one p-17">
                                            <div class="testimonial-widget-one owl-carousel owl-theme">
                                                <!-- <div class="item">
                                                    <div class="testimonial-content">
                                                        <div class="testimonial-text">
                                                            <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet,
                                                            consectetur adipisicing elit, sed do eiusmod tempor
                                                            incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                            minim veniam, quis
                                                            nostrud exercitation <i class="fa fa-quote-right"></i>
                                                        </div>
                                                        <img class="testimonial-author-img"
                                                            src="assets/images/avatar/1.jpg" alt="" />
                                                        <div class="testimonial-author">TYRION LANNISTER</div>
                                                        <div class="testimonial-author-position">Founder-Ceo. Dell Corp
                                                        </div>
                                                    </div>
                                                </div> -->
                                                @include('karyawan.layouts.ColaSef')
                                                @include('karyawan.layouts.ColaZid')
                                                @include('karyawan.layouts.ColaVer')
                                                @include('karyawan.layouts.ColaRik')
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /end - colaborator -->

                        <!-- /# column -->
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-title pr">
                                    @can('bendahara')
                                    <h4>Gaji</h4>
                                    @else
                                    <h4>Kehadiran</h4>
                                    @endcan
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table student-data-table m-t-20">
                                            @if(auth()->user()->level == 'bendahara')
                                            <thead>
                                                <tr>
                                                    <th>Karyawan</th>
                                                    <th>Nominal</th>
                                                    <th>Status</th>
                                                    <th>Tanggal Bayar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach( $pembayarans as $pembayaran )
                                                <tr>
                                                    <td>{{ $pembayaran->user->name }}</td>
                                                    <td><span class="badge badge-primary">RP. {{ number_format($pembayaran->gaji) }}</span></td>
                                                    <td><span class="badge badge-success">Dikonfirmasi</span></td>
                                                    <td>Proses</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            @else
                                            <thead>
                                                <tr>
                                                    <th>Karyawan</th>
                                                    <th>Status</th>
                                                    <th>Waktu Masuk</th>
                                                    <th>Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach( $kehadirans as $kehadiran)
                                                <tr>
                                                    <td>{{ $kehadiran->user->name }}</td>
                                                    <td>
                                                    @if($kehadiran->status === 'hadir')
                                                            @if( $kehadiran->jammasuk >= $kehadiran->shift->time_in)
                                                                <span class="badge badge-danger">Terlambat</span>
                                                            @else
                                                                <span class="badge badge-success">Hadir</span>
                                                            @endif
                                                        @elseif($kehadiran->status === 'sakit')
                                                        <span class="badge badge-warning">Sakit</span>
                                                        @elseif($kehadiran->status === 'izin')
                                                        <span class="badge badge-warning">izin</span>
                                                        @else
                                                        <span class="badge badge-danger">Tidak Hadir</span>
                                                        @endif
                                                    </td>
                                                    <td><span class="badge badge-primary">{{ $kehadiran->jammasuk }}</span></td>
                                                    <td>{{ $kehadiran->updated_at->diffForHumans() }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="year-calendar"></div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- # card -->
                        <!-- /# card -->
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
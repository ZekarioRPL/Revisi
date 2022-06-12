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
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
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
                                <h1> <span> </span></h1>
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

                <!-- content -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>{{ $title }}</h4>
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="row-select" class="display table table-borderd table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Mount</th>
                                                    <th>Jam Masuk</th>
                                                    <th>Jam Keluar</th>
                                                    <th>Shift</th>
                                                    <!-- <th>Jam Kerja</th> -->
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Lokasi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach( $absens as $absen)
                                                <?php
                                                    // untuk bulan
                                                    $tanggal = $absen->tgl;
                                                    $mount = date('M', strtotime($tanggal));
                                                    $mountList = array(
                                                        'Jan' => "Januari",
                                                        'Feb' => "Februari",
                                                        'Mar' => "Maret",
                                                        'Apr' => "April",
                                                        'May' => "Mei",
                                                        'Jun' => "Juni",
                                                        'Jul' => "Juli",
                                                        'Aug' => "Agustus",
                                                        'Sep' => "September",
                                                        'Oct' => "October",
                                                        'Nov' => "November",
                                                        'Dec' => "Desember"
                                                    );
                                                ?>
                                                <tr>
                                                    <td>{{ $absen->user->name }}</td>
                                                    <td><?php echo $mountList[$mount];?></td>
                                                    @if(empty($absen->jammasuk)) 
                                                        <td>00:00:00</span></td>
                                                    @else
                                                        <td>{{ $absen->jammasuk }}</span></td>
                                                    @endif

                                                    @if(empty($absen->jamkeluar)) 
                                                        <td>00:00:00</span></td>
                                                    @else
                                                        <td>{{ $absen->jamkeluar }}</span></td>
                                                    @endif
                                                    @if($absen->shift)
                                                    <td>{{ $absen->shift->shift_name }}</td>
                                                    @else
                                                    <td></td>
                                                    @endif
                                                    <td>{{ $absen->tgl }}</td>
                                                    <td>
                                                    @if($absen->status === 'hadir')
                                                            @if( $absen->jammasuk >= $absen->shift->time_in)
                                                                <span class="badge badge-danger"> Terlambat</span>
                                                            @else
                                                                <span class="badge badge-success"> Hadir</span>
                                                            @endif
                                                        @elseif($absen->status === 'sakit')
                                                        <span class="badge badge-warning"> Sakit</span>
                                                        @elseif($absen->status === 'izin')
                                                        <span class="badge badge-warning"> izin</span>
                                                        @else
                                                        <span class="badge badge-danger"> Tidak Hadir</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-secondary border-0 shadow-none" href="https://www.google.com/maps/search/{{ $absen->latitude }},{{ $absen->longitude }}?sa=X&ved=2ahUKEwjusPjP-KP3AhWLRmwGHQAzB2sQ8gF6BAgCEAE" role="button" target="_blank"><span data-feather="map-pin"></span></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Day</th>
                                                    <th>Mount</th>
                                                    <th>Jam Masuk</th>
                                                    <th>Jam Keluar</th>
                                                    <th>Jam Kerja</th>
                                                    <th>Date</th>                                                    
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>2018 © Admin Board. - <a href="#">example.com</a></p>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /end-content -->

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
    
    <!-- bootstrap -->

    <script src="assets/js/lib/bootstrap.min.js"></script><script src="assets/js/scripts.js"></script>
    <!-- scripit init-->
    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>

<!-- /end - javascript -->
@endsection
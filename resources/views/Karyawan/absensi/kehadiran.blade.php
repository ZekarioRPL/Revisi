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
@if(!empty($tanggalPertama->tgl))
<?php
// untuk bulan
$tanggal = $tanggalPertama->tgl;
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
@endif
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
                                    <li class="breadcrumb-item active">Kehadiran</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->

                <!-- content -->
                <div class="col-lg-20">
                            <div class="card">
                                <div class="card-title">
                                @if(!empty($tanggalPertama->tgl))
                                    <h4><strong><?php echo "Bulan : " . $mountList[$mount]; ?></strong> </h4>
                                @endif
                                    
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover ">
                                            <thead>
                                                <tr>
                                                    <th>Day</th>
                                                    <th>Jam Masuk</th>
                                                    <th>Jam Pulang</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach( $kehadirans as $kehadiran)
                                                <?php
                                                $tanggal = $kehadiran->tgl;
                                                $mount2 = date('M', strtotime($tanggal));
                                                $mountList2 = array(
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
                                                $day = date('D', strtotime($tanggal));
                                                $dayList = array(
                                                    'Sun' => 'Minggu',
                                                    'Mon' => 'Senin',
                                                    'Tue' => 'Selasa',
                                                    'Wed' => 'Rabu',
                                                    'Thu' => 'Kamis',
                                                    'Fri' => 'Jumat',
                                                    'Sat' => 'Sabtu'
                                                );
                                                ?>
                                                @if( $mountList2[$mount2] === $mountList[$mount])
                                                <tr>
                                                    <td>
                                                        <?php echo $dayList[$day]; ?>
                                                        @if( $kehadiran->jammasuk >= $kehadiran->shift->time_in)
                                                            <span class="badge badge-danger">Telat</span>
                                                        @else
                                                            <span class="badge badge-success">Hadir</span>
                                                        @endif
                                                    </td>
                                                    @if(empty($kehadiran->jammasuk)) 
                                                        <td><span class="badge badge-primary">00:00:00</span></td>
                                                    @else
                                                        <td><span class="badge badge-primary">{{ $kehadiran->jammasuk }}</span></td>
                                                    @endif

                                                    @if(empty($kehadiran->jamkeluar)) 
                                                        <td><span class="badge badge-primary">00:00:00</span></td>
                                                    @else
                                                        <td><span class="badge badge-primary">{{ $kehadiran->jamkeluar }}</span></td>
                                                    @endif
                                                    <td class="color-info">{{ $kehadiran->tgl }}</td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
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

<!-- /end - javascript -->
@endsection
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
    <link href="assets/css/lib/data-table/buttons.bootstrap.min.css" rel="stylesheet" />
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
                @if ($message = Session::get('bisa'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat! </strong>{{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <!-- /# row -->

                <!-- content -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card"> 
                                <div class="bootstrap-data-table-panel">
                                @can('admin')
                                    <div>
                                        <a class="btn btn-primary border-0 shadow-none" href="/tambahkaryawan" role="button">
                                            <span data-feather="user-plus"></span><strong>Tambah Karyawan</strong>
                                        </a>
                                    </div>
                                @endcan
                                    <br>
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Jabatan</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Alamat</th>
                                                    @can('admin')
                                                    <th>Action</th> 
                                                    @endcan
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach( $karyawans as $karyawan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $karyawan->name }}</td>
                                                    @if( $karyawan->jabatan)
                                                    <td>{{ $karyawan->jabatan->jabatan }}</td>
                                                    @else
                                                    <td></td>
                                                    @endif
                                                    @if(empty($karyawan->jenis_kelamin)) 
                                                    <td>Not Inputable!</td>
                                                    @else
                                                    <td>{{ $karyawan->jenis_kelamin }}</td>
                                                    @endif
                                                    @if(empty($karyawan->tanggal_lahir)) 
                                                    <td>Not Inputable!</td>
                                                    @else
                                                    <td>{{ $karyawan->tanggal_lahir }}</td>
                                                    @endif

                                                    @if(empty($karyawan->alamat)) 
                                                    <td>Not Inputable!</td>
                                                    @else
                                                    <td>{{ $karyawan->alamat }}</td>
                                                    @endif
                                                    <td>
                                                    <a href="/ubah-password/{{ $karyawan->id }}" class="badge bg-success border-0">Ubah</a>
                                                </td>
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
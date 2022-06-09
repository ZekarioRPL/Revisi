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
        <div class="alert">

        </div>     
        @if ($message = Session::get('error'))
         <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <strong>Maaf </strong>{{ $message }}<strong>{{ request('search') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif 
        
        <!-- /# row -->
        <!-- content -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>{{ $title }}</h4>
                    
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="/pembayaran">
                            <div class="form-group">
                                <p class="text-muted m-b-15 f-s-12">Input <code>Code Gaji </code>di bawah Sini atau<code> Scan Code QR</code></p>
                                <div class="input-group input-group-rounded">
                                    <input type="text" placeholder="Input Kode / QR" name="search" class="form-control" value="{{ request('search') }}">
                                    <span class="input-group-btn"><button class="btn btn-primary btn-group-right" type="submit"><i class="ti-search"></i></button></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content - End -->

        @if(!empty(request('search')))
        @if (!empty($search))
        <!-- Content - slip Gaji -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>Slip Gaji</h4>
                    <hr>
                </div>
                <!-- Slip Gaji -->
                    <div class="card-body pt-0 mt-0 ">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="invoice" class="effect2 ">
                                    <div id="invoice-top">

                                        <!--End Info-->
                                        <div class="title">
                                            <h4>Tanggal</h4>
                                            
                                            <p>{{ $search->tanggal }}<br> {{ $search->updated_at->diffForHumans() }}

                                            
                                            </p>
                                        </div>
                                        <!--End Title-->
                                    </div>
                                    <!--End InvoiceTop-->
        
        
        
                                    <div id="invoice-mid">
        
                                        <div class="clientlogo">  <img class="img-fluid " src="{{ asset('storage/' . $search->karyawan->image) }}" width="100px" /></div>
                                        <div class="invoice-info">
                                            <h2>{{ $search->karyawan->name }}</h2>
                                            <p>{{ $search->karyawan->email }}<br> {{ $search->karyawan->alamat }}
                                                <br>
                                        </div>
        
                                        <div id="project">
                                            <h2>Deskripsi gaji</h2>
                                            <p>Proin cursus, dui non tincidunt elementum, tortor ex feugiat enim, at elementum enim quam vel purus. Curabitur semper malesuada urna ut suscipit.</p>
                                        </div>
        
                                    </div>
                                    <!--End Invoice Mid-->
        
                                    <div id="invoice-bot">
        
                                        <div id="invoice-table">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr class="tabletitle">
                                                        <td class="table-item">
                                                            <h2>Jumlah Gaji</h2>
                                                        </td>
                                                        <td class="Hours">
                                                            <h2>:</h2>
                                                        </td>
                                                        <td class="Rate">
                                                            <h2>Rp. </h2>
                                                        </td>
                                                        <td class="subtotal">
                                                            <h2>{{ $search->gaji }}</h2>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <!--End Table-->
                                        <br>
                                        <form action="/pembayaran/{{ $search->id }}" method="post">
                                            @csrf
                                            <div class="row justify-content-center ">
                                                @if ($search->status == null)
                                                    <button class="btn btn-success w-80 pt-3 pb-3" onclick="return confirm(' Apa Kamu Mau Mengkonfirmasinya? ')">Konfirmasi</button>
                                                @else
                                                    <button class="btn btn-secondary w-80 pt-3 pb-3" disabled onclick="return confirm(' Apa Kamu Mau Mengkonfirmasinya? ')">Konfirmasi</button>
                                                @endif
                                                
                                            </div>
                                        </form>
                                        @endif

                                    </div>
                                    <!--End InvoiceBot-->
                                </div>
                                <!--End Invoice-->
                            </div>
                        </div>      
                    </div>
                <!-- Slip Gaji - End -->
            </div>
        </div>
        <!-- Content - slip Gaji -End... -->
        @endif

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
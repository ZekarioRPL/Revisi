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
    <link href="/assets/css/lib/select2/select2.min.css" rel="stylesheet">
    <link href="/assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="/assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="/assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/lib/helper.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
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
                                    <?php
                                    function passAcak($panjang)
                                    {
                                    $karakter = '';
                                    $karakter .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; // karakter alfabet
                                    $karakter .= '1234567890'; // karakter numerik
                                    //  $karakter .= '@#$^*()_+=/?'; // karakter simbol
                                    
                                    $string = '';
                                    for ($i=0; $i < $panjang; $i++) { 
                                    $pos = rand(0, strlen($karakter)-1);
                                    $string .= $karakter{$pos};
                                    }
                                    return $string;
                                    }
                                    ?>
                                      <!-- form -->
                                      <form class="form-valide" action="/gaji" method="post">
                                      @csrf

                                            <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="karyawan_id">Nama Karyawan <span class="text-danger">*</span></label>
                                              <div class="col-lg-8">
                                                  <select class="js-nama_Karyawan form-control" id="karyawan_id" name="karyawan_id" style="width: 100%;" data-placeholder="Choose one.." required>
                                                      <option></option>
                                                      @foreach( $karyawans as $karyawan)
                                                        <option value="{{ $karyawan->id }}">{{ $karyawan->name }}</option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                            </div>
                                            <!-- <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="bulan">Gaji Bulan <span class="text-danger">*</span></label>
                                              <div class="col-lg-8">
                                                  <select class="js-nama_bulan form-control" id="bulan" name="bulan" style="width: 100%;" data-placeholder="Choose one.." required>
                                                      <option></option>                                  
                                                      <option value="januari">Januari</option>
                                                      <option value="februari">Februari</option>
                                                      <option value="maret">Maret</option>
                                                      <option value="april">April</option>
                                                      <option value="mei">Mei</option>
                                                      <option value="juni">Juni</option>
                                                      <option value="juli">Juli</option>
                                                      <option value="agustus">Agustus</option>
                                                      <option value="september">September</option>
                                                      <option value="oktober">Oktober</option>
                                                      <option value="november">November</option>
                                                      <option value="desember">Desember</option>
                                                  </select>
                                              </div>
                                            </div> -->
                                            <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="gaji">Gaji <span class="text-danger">*</span></label>
                                              <div class="col-lg-8">
                                                  <input type="number" class="form-control" id="gaji" name="gaji" required placeholder="Enter a gaji.. (RP.)">
                                                </div>
                                            </div>
                                            <!-- <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-bukti">Bukti Pembayaran <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="val-bukti" name="val-bukti" placeholder="Enter a bukti.." disabled>
                                                </div>
                                            </div> -->
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="tanggal">date <span class="text-danger">*</span></label>
                                                <div class="col-lg-8">
                                                    <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Enter a date.." required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-8">
                                                    <input type="hidden" class="form-control" id="kode" name="kode" value="<?php echo passAcak(8);?>" required>
                                                </div>
                                            </div>
                                          <div class="form-group row">
                                              <div class="col-lg-8 ml-auto">
                                                  <button type="submit" class="btn btn-primary">Order</button>
                                              </div>
                                          </div>

                                      </form>
                                      <!-- /end-form -->
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
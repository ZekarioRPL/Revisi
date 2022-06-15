<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <link rel="shortcut icon" href="{{ '/storage/' . $data->image }}">
    <title>{{ $title }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    

    <!-- Bootstrap core CSS -->
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="/css/DashboardMain.css">
    <link rel="stylesheet" href="/css/dashboard.rtl.css">
  </head>
  <body onload="window.print()">
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
        <!-- content - End -->
<a href="/gaji">Kembali</a>
        <!-- Content - slip Gaji -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title m-3">
                    <h4 class="text-center">Slip Gaji</h4>
                    <hr>
                </div>
                <!-- Slip Gaji -->
                    <div class="card-body pt-0 mt-0 ms-5 me-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="invoice" class="effect2 ">
                                    <div class="row d-flex">
                                    <!-- <div class="clientlogo">  </div> -->
                                    <div class="col-md-3">

                                        <div class="invoice-info">
                                            <h3>{{ $data->nama_perusahaan }}</h3>
                                            <p>{{ $data->alamat }}<br>
                                                <br>
                                        </div>
                                    </div>
                                        <!--End Info-->
                                        <div class="col-md-8">

                                            <div class="text-end">
                                                <h4>Tanggal</h4>
                                                <p>{{ $search->tanggal }}<br> {{ $search->updated_at->diffForHumans() }}
                                                </p>
                                            </div>
                                        </div>
                                        <!--End Title-->
                                    </div>
                                    <!--End InvoiceTop-->
        
        
        <br>
                                    <div id="invoice-mid">
        
                                        <!-- <div class="clientlogo">  </div> -->
                                        <div class="invoice-info">
                                            <h3> Name : {{ $search->karyawan->name }}</h3>
                                            <p>Email : {{ $search->karyawan->email }}<br> Alamat : {{ $search->karyawan->alamat }}
                                                <br>
                                                @if($search->karyawan->jabatan) 
                                                Jabatan :  {{ $search->karyawan->jabatan->jabatan }}
                                                @endif
                                        </div>
        
                                        <div id="project">
                                            <h2>Deskripsi gaji</h2>
                                        </div>
        <br>
                                    </div>
                                    <!--End Invoice Mid-->
        
                                    <div id="invoice-bot">
        
                                        <div id="invoice-table">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <?php
                                                    if ($search->karyawan->jabatan) {
                                                        $jabatan = $search->karyawan->jabatan->gaji;
                                                    }
                                                    if ($search->gaji) {
                                                        $semua = $search->gaji;
                                                    }
                                                    $pokok = $semua - $jabatan;
                                                    
                                                    ?>
                                                    <tr>
                                                    <td>Gaji Pokok</td>
                                                        <td>:</td>
                                                        <td>Rp.</td>
                                                        <td><?php echo $pokok; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gaji Jabatan</td>
                                                        <td>:</td>
                                                        <td>Rp.</td>
                                                        <td>
                                                        @if($search->karyawan->jabatan) 
                                                        {{ $search->karyawan->jabatan->gaji }}
                                                        @endif
                                                        </td>
                                                    </tr>
                                                    <tr></tr>
                                                    <tr class="tabletitle">
                                                        <td class="table-item">
                                                            <h3>Jumlah Gaji</h3>
                                                        </td>
                                                        <td class="Hours">
                                                            <h3>:</h3>
                                                        </td>
                                                        <td class="Rate">
                                                            <h3>Rp. </h3>
                                                        </td>
                                                        <td class="subtotal">
                                                            <h3>{{ $search->gaji }}</h3>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <!--End Table-->
                                        <br>
                                        @can('bendahara')
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
                                        @else
                                        @endcan
                                                    

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
      </div>
    </div>
</div>




<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
      <script src="/js/DashboardMain.js"></script>
</body>
</html>
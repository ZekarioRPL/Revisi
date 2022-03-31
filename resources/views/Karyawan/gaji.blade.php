@extends('Dashboard.DashboardMain')

@section('container')
<h1>Gaji</h1>
<div class="col-md-3 col-lg-3 col-xl-3 col-xs-12 col-sm-12 mb-4" data-aos="fade-up" data-aos-duration="500">
    <a href="#" style="text-decoration:none;">
    <div class="card border-left-primary shadow-sm h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Saldo</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        RP.
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-download fa-2x text-primary"></i>
                </div>
            </div>
        </div>
    </div>
    </a>
</div>
@endsection
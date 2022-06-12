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


    <!-- Common -->
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
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
          <div class="main-content">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <div class="compose-email">
                      <div class="mail-box">
                        <aside class="sm-side">
                          <div class="user-head">
                            <!-- <a class="inbox-avatar" href="javascript:;">
                                                        <img src="assets/images/user.jpg" alt="">
                                                    </a> -->
                            <div class="user-name">
                              <h5><a href="/profils">{{ auth()->user()->name }}</a></h5>
                              <span><a href="/profils">{{ auth()->user()->email }}</a></span>
                            </div>
                          </div>
                          <div class="inbox-body text-center">
                            <!-- <a href="#myModal" data-toggle="modal" title="Compose" class="btn btn-compose"> Compose</a> -->
                            <!-- Modal -->
                            <div aria-hidden="true" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content text-left">
                                  <div class="modal-header">
                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button"><i class="ti-close"></i></button>
                                    <h4 class="modal-title">Compose</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form-horizontal">
                                      <div class="form-group">
                                        <label class="col-lg-2 control-label">To</label>
                                        <div class="col-lg-10">
                                          <input type="text" placeholder="" id="inputEmail1" class="form-control">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-lg-2 control-label">Cc / Bcc</label>
                                        <div class="col-lg-10">
                                          <input type="text" placeholder="" id="cc" class="form-control">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-lg-2 control-label">Subject</label>
                                        <div class="col-lg-10">
                                          <input type="text" placeholder="" id="inputPassword1" class="form-control">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-lg-2 control-label">Message</label>
                                        <div class="col-lg-10">
                                          <textarea rows="10" cols="30" class="form-control" id="texarea1" name="texarea"></textarea>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                          <span class="btn green fileinput-button"><i class="fa fa-plus fa fa-white"></i>
																	<span>Attachment</span>
                                          <input type="file" name="files[]" multiple="">
                                          </span>
                                          <button class="btn btn-primary" type="submit">Send</button>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                          </div>
                          @can('admin')
                          <div class="btn-group position-center">
                              <a class="btn mini btn-primary" href="/gaji/create">
                                <i class="fa fa-plus"></i>
                                Berikan Gaji
                              </a>
                          </div>
                          @endcan
                        </aside>
                        <aside class="lg-side">
                          <div class="inbox-head">
                            <h3 class="input-text">Gaji</h3>
                            <!-- <form action="#" class="pull-right position">
                              <div class="input-append inner-append">
                                <input type="text" class="sr-input" placeholder="Search Mail">
                                <button class="btn sr-btn append-btn" type="button"><i class="fa fa-search"></i></button>
                              </div>
                            </form> -->
                          </div>

                          <!-- content -->
                          <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                              @can('admin')
                                              <tr>
                                                  <th>#</th>
                                                  <th>Username</th>
                                                  <th>Nominal</th>
                                                  <th>Status</th>
                                                  <th>Tanggal</th>
                                                  <th>QR</th>
                                              </tr>
                                              @endcan
                                              
                                              @can('karyawan')
                                              <tr>
                                                  <th>#</th>
                                                  <th>Tanggal</th>
                                                  <th>Nominal</th>
                                                  <th>Status</th>
                                                  <th>Action</th>
                                              </tr>
                                              @endcan
                                              @can('bendahara')
                                              <tr>
                                                  <th>#</th>
                                                  <th>Tanggal</th>
                                                  <th>Nominal</th>
                                                  <th>Status</th>
                                              </tr>
                                              @endcan
                                            </thead>
                                            <tbody>
                                              @can('admin')
                                                @foreach( $gaji_admins as $gaji_admin )
                                                <tr>
                                                  <td>{{ $loop->iteration }}</td>
                                                  <td>{{ $gaji_admin->karyawan->username }}</td>
                                                  <td>RP. {{ number_format($gaji_admin->gaji) }}</td>
                                                  @if( !empty($gaji_admin->status) )
                                                  <td><span class="badge badge-success">Dikonfirmasi</span></td>
                                                  @else
                                                  <td><span class="badge badge-warning">Belum Dikonfirmasi</span></td>
                                                  @endif
                                                  <td>{{ $gaji_admin->tanggal }}</td>
                                                  <td>
                                                  <div class="btn-group">
                                                    <a class="btn mini btn-secondary" href="/qrcode/{{ $gaji_admin->id }}">
                                                      <span data-feather="arrow-right-circle" ></span>
                                                    </a>
                                                  </div>
                                                  </td>
                                                </tr>
                                                @endforeach
                                              @endcan
                                              @can('karyawan')
                                                @foreach( $gaji_karyawans as $gaji_karyawan )
                                                <tr>
                                                  <td>{{ $loop->iteration }}</td>
                                                  <td>{{ $gaji_karyawan->tanggal }}</td>
                                                  <td>RP. {{ number_format($gaji_karyawan->gaji) }}</td>
                                                  @if( !empty($gaji_karyawan->status) )
                                                  <td><span class="badge badge-success">Dikonfirmasi</span></td>
                                                  @else
                                                  <td><span class="badge badge-warning">Belum Dikonfirmasi</span></td>
                                                  @endif
                                                  <td>
                                                  <div class="btn-group">
                                                    <a class="btn mini btn-secondary" href="/qrcode/{{ $gaji_karyawan->id }}">
                                                      <span data-feather="arrow-right-circle" ></span>
                                                    </a>
                                                  </div>
                                                  </td>
                                                </tr>
                                                @endforeach
                                              @endcan
                                              @can('bendahara')
                                                @foreach( $bendaharas as $bendahara )
                                                <tr>
                                                  <td>{{ $loop->iteration }}</td>
                                                  <td>{{ $bendahara->tanggal }}</td>
                                                  <td>RP. {{ number_format($bendahara->gaji) }}</td>
                                                  @if( !empty($bendahara->status) )
                                                  <td><span class="badge badge-success">Dikonfirmasi</span></td>
                                                  @else
                                                  <td><span class="badge badge-warning">Belum Dikonfirmasi</span></td>
                                                  @endif
                                                </tr>
                                                @endforeach
                                              @endcan
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
                          <!-- / -- content -->
                        </aside>
                      </div>
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
          </div>
        </div>
      </div>
    </div>
<!-- /end - content -->


<!-- javascript -->
<script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- scripit init-->
<!-- /end - javascript -->
@endsection
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
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="compose-email">
                      <div class="mail-box">
                        <aside class="sm-side">
                          <div class="user-head">
                            <a class="inbox-avatar" href="javascript:;">
                                                        <img src="assets/images/user.jpg" alt="">
                                                    </a>
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
                          <!-- <ul class="inbox-nav inbox-divider">
                            <li class="breadcrumb-item active">
                              <a href="#"><i class="fa fa-inbox"></i> Inbox <span class="badge badge-success pull-right m-t-12">2</span></a>
                            </li>
                            <li>
                              <a href="#"><i class="fa fa-envelope-o"></i> Sent Mail</a>
                            </li>
                            <li>
                              <a href="#"><i class="fa fa-bookmark-o"></i> Important</a>
                            </li>
                            <li>
                              <a href="#"><i class=" fa fa-external-link"></i> Drafts <span class="badge badge-info pull-right m-t-12">30</span></a>
                            </li>
                            <li>
                              <a href="#"><i class=" fa fa-trash-o"></i> Trash</a>
                            </li>
                          </ul>


                          <div class="inbox-body text-center">
                            <div class="btn-group">
                              <a class="btn mini btn-primary" href="javascript:;">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                            </div>
                            <div class="btn-group">
                              <a class="btn mini btn-success" href="javascript:;">
                                                            <i class="fa fa-phone"></i>
                                                        </a>
                            </div>
                            <div class="btn-group">
                              <a class="btn mini btn-info" href="javascript:;">
                                                            <i class="fa fa-cog"></i>
                                                        </a>
                            </div>
                          </div> -->

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
                          <!-- <div class="mail-option">
                            <div class="chk-all chk-group">
                              <input type="checkbox" class="mail-checkbox mail-group-checkbox" id="checkAll" />
                              <div class="btn-group">
                                <a data-toggle="dropdown" href="#" class="btn mini all m-l-10" aria-expanded="false">All<i class="fa fa-angle-down "></i></a>
                                <ul class="card-option-dropdown dropdown-menu">
                                  <li><a href="#"> None</a></li>
                                  <li><a href="#"> Read</a></li>
                                  <li><a href="#"> Unread</a></li>
                                </ul>
                              </div>
                            </div>

                            <div class="btn-group">
                              <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
                                                            <i class=" fa fa-refresh"></i>
                                                        </a>
                            </div>
                            <div class="btn-group hidden-phone">
                              <a data-toggle="dropdown" href="#" class="btn mini blue" aria-expanded="false"> More<i class="fa fa-angle-down "></i></a>

                              <ul class="card-option-dropdown dropdown-menu">
                                <li><a href="#"><i class="ti-pencil"></i> Mark as Read</a></li>
                                <li><a href="#"><i class="ti-menu-alt"></i>Spam</a></li>
                                <li><a href="#"><i class="ti-trash"></i>Delete</a></li>
                              </ul>
                            </div>
                            <div class="btn-group">
                              <a data-toggle="dropdown" href="#" class="btn mini blue">Move to<i class="fa fa-angle-down "></i></a>
                              <ul class="card-option-dropdown dropdown-menu">
                                <li><a href="#">Draft</a></li>
                                <li><a href="#">Spam</a></li>
                                <li><a href="#"> Delete</a></li>
                              </ul>
                            </div>

                            <ul class="unstyled inbox-pagination pagination-list">
                              <li><span>1-50 of 234</span></li>
                              <li>
                                <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
                              </li>
                              <li>
                                <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
                              </li>
                            </ul>
                          </div> -->
                          <!-- <div class="table-responsive">
                            <table class="table table-inbox table-hover table-responsive">
                              <tbody>
                                <tr class="unread">
                                  <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                  </td>
                                  <td class="inbox-small-cells"><i class="ti-star"></i></td>
                                  <td class="view-message  dont-show">PHPClass</td>
                                  <td class="view-message ">Added a new class: Login Class Fast Site</td>
                                  <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                                  <td class="view-message  text-right">9:27 AM</td>
                                </tr>
                                <tr class="unread">
                                  <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                  </td>
                                  <td class="inbox-small-cells"><i class="ti-star"></i></td>
                                  <td class="view-message dont-show">Google Webmaster </td>
                                  <td class="view-message">Improve the search presence of WebSite</td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">March 15</td>
                                </tr>
                                <tr class="">
                                  <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                  </td>
                                  <td class="inbox-small-cells"><i class="ti-star"></i></td>
                                  <td class="view-message dont-show">JW Player</td>
                                  <td class="view-message">Last Chance: Upgrade to Pro for </td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">March 15</td>
                                </tr>
                                <tr class="">
                                  <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                  </td>
                                  <td class="inbox-small-cells"><i class="ti-star"></i></td>
                                  <td class="view-message dont-show">Tim Reid, S P N</td>
                                  <td class="view-message">Boost Your Website Traffic</td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">April 01</td>
                                </tr>
                                <tr class="">
                                  <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                  </td>
                                  <td class="inbox-small-cells"><i class="ti-star inbox-started"></i></td>
                                  <td class="view-message dont-show">Freelancer.com <span class="badge badge-danger pull-right m-t-6">urgent</span></td>
                                  <td class="view-message">Stop wasting your visitors </td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">May 23</td>
                                </tr>
                                <tr class="">
                                  <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                  </td>
                                  <td class="inbox-small-cells"><i class="ti-star inbox-started"></i></td>
                                  <td class="view-message dont-show">WOW Slider </td>
                                  <td class="view-message">New WOW Slider v7.8 - 67% off</td>
                                  <td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                                  <td class="view-message text-right">March 14</td>
                                </tr>
                                <tr class="">
                                  <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                  </td>
                                  <td class="inbox-small-cells"><i class="ti-star inbox-started"></i></td>
                                  <td class="view-message dont-show">LinkedIn Pulse</td>
                                  <td class="view-message">The One Sign Your Co-Worker Will Stab</td>
                                  <td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                                  <td class="view-message text-right">Feb 19</td>
                                </tr>
                                <tr class="">
                                  <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                  </td>
                                  <td class="inbox-small-cells"><i class="ti-star"></i></td>
                                  <td class="view-message dont-show">Drupal Community<span class="badge badge-success pull-right m-t-6">megazine</span></td>
                                  <td class="view-message view-message">Welcome to the Drupal Community</td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">March 04</td>
                                </tr>
                                <tr class="">
                                  <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                  </td>
                                  <td class="inbox-small-cells"><i class="ti-star"></i></td>
                                  <td class="view-message dont-show">Facebook</td>
                                  <td class="view-message view-message">Somebody requested a new password </td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">June 13</td>
                                </tr>
                                <tr class="">
                                  <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                  </td>
                                  <td class="inbox-small-cells"><i class="ti-star"></i></td>
                                  <td class="view-message dont-show">Skype <span class="badge badge-info pull-right m-t-6">family</span></td>
                                  <td class="view-message view-message">Password successfully changed</td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">March 24</td>
                                </tr>
                                <tr class="">
                                  <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                  </td>
                                  <td class="inbox-small-cells"><i class="ti-star inbox-started"></i></td>
                                  <td class="view-message dont-show">Google+</td>
                                  <td class="view-message">alireza, do you know</td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">March 09</td>
                                </tr>
                                <tr class="">
                                  <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                  </td>
                                  <td class="inbox-small-cells"><i class="ti-star inbox-started"></i></td>
                                  <td class="dont-show">Zoosk </td>
                                  <td class="view-message">7 new singles we think you'll like</td>
                                  <td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                                  <td class="view-message text-right">May 14</td>
                                </tr>
                                <tr class="">
                                  <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                  </td>
                                  <td class="inbox-small-cells"><i class="ti-star"></i></td>
                                  <td class="view-message dont-show">LinkedIn </td>
                                  <td class="view-message">Alireza: Nokia Networks, System Group and </td>
                                  <td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                                  <td class="view-message text-right">February 25</td>
                                </tr>
                                <tr class="">
                                  <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                  </td>
                                  <td class="inbox-small-cells"><i class="ti-star"></i></td>
                                  <td class="dont-show">Facebook</td>
                                  <td class="view-message view-message">Your account was recently logged into</td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">March 14</td>
                                </tr>
                                <tr class="">
                                  <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                  </td>
                                  <td class="inbox-small-cells"><i class="ti-star"></i></td>
                                  <td class="view-message dont-show">Twitter</td>
                                  <td class="view-message">Your Twitter password has been changed</td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">April 07</td>
                                </tr>
                                <tr class="">
                                  <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                  </td>
                                  <td class="inbox-small-cells"><i class="ti-star"></i></td>
                                  <td class="view-message dont-show">InternetSeer Website Monitoring</td>
                                  <td class="view-message">http://golddesigner.org/ Performance Report</td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">July 14</td>
                                </tr>
                                <tr class="">
                                  <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                  </td>
                                  <td class="inbox-small-cells"><i class="ti-star inbox-started"></i></td>
                                  <td class="view-message dont-show">AddMe.com</td>
                                  <td class="view-message">Submit Your Website to the AddMe Business Directory</td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">August 10</td>
                                </tr>
                                <tr class="">
                                  <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                  </td>
                                  <td class="inbox-small-cells"><i class="ti-star"></i></td>
                                  <td class="view-message dont-show">Terri Rexer, S P N</td>
                                  <td class="view-message view-message">Forget Google AdWords: Un-Limited Clicks fo</td>
                                  <td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                                  <td class="view-message text-right">April 14</td>
                                </tr>
                                <tr class="">
                                  <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                  </td>
                                  <td class="inbox-small-cells"><i class="ti-star"></i></td>
                                  <td class="view-message dont-show">Bertina </td>
                                  <td class="view-message">IMPORTANT: Don't lose your domains!</td>
                                  <td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                                  <td class="view-message text-right">June 16</td>
                                </tr>
                                <tr class="">
                                  <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                  </td>
                                  <td class="inbox-small-cells"><i class="ti-star inbox-started"></i></td>
                                  <td class="view-message dont-show">Laura Gaffin, S P N </td>
                                  <td class="view-message">Your Website On Google (Higher Rankings Are Better)</td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">August 10</td>
                                </tr>
                                <tr class="">
                                  <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                  </td>
                                  <td class="inbox-small-cells"><i class="ti-star"></i></td>
                                  <td class="view-message dont-show">Facebook</td>
                                  <td class="view-message view-message">john doe Login faild</td>
                                  <td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                                  <td class="view-message text-right">feb 14</td>
                                </tr>
                              </tbody>
                            </table>
                          </div> -->

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
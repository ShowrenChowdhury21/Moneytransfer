<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MoneyTransfer - User</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styleuser.css') }}"/>
</head>
<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"></div>
</div>

<!-- Document Wrapper -->
<div id="main-wrapper">
    <header class="header02">
        <!--header -->
        <div class="header-main">
            <div class="container d-flex align-items-center">
                <a class="logo d-inline-flex" href="#">
                    <img src="{{ asset('assets/img/logo/logo3.png') }}" alt="">
                </a>
                <nav class="primary-menu ml-auto">
                    <a id="logout" href="/login"><i class="fas fa-sign-out-alt" style="color: #413c69; font-size: 30px;"></i></a>
                    <ul>
                        <li class="has-menu-child pro-menu-drop">
                            <a href="#">
                                <div class="header-pro-thumb"></div>{{Session::get('name')}}<i class="fa fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu-md sub-menu profile-drop">
                                 <li class="dropdown-header">
                                    <div>
                                        <h5 class="hidden-xs m-b-0 text-primary text-ellipsis" style="font-size: 16px;">{{Session::get('name')}}</h5>
                                        <div class="small text-muted"><span>Membership ID {{Session::get('id')}}</span></div>
                                    </div>
                                </li>
                                <li><hr class="mx-n3 mt-0"></li>
                                <li class="nav__create-new-profile-link">
                                    <a href="/user/profile">
                                        <span>View personal profile</span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li class="nav__dropdown-menu-items">
                                    <a href="/login"><i class="icon icon-logout"></i><span>Logout</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!--end main header-->
    </header>
    <!-- Header end -->
    <!-- Content  -->
    <div id="content" class="py-4">
        <div class="container">
            <div class="row">
                <!-- Left side bar -->
                <aside class="col-lg-3 sidebar">
                    <!-- Pages List  -->
                    <div class="bg-light shadow-sm text-center  mb-4">
                        <div class="Profile-menu">
                            <ul class="nav secondary-nav">
                                <li class="nav-item"><a class="nav-link " href="/user/dashboard"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/transactions"><i class="fa fa-list-ul"></i> Transactions</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/deposit"><i class="fa fa-plus"></i> Deposit Money</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/sendmoney"><i class="far fa-paper-plane"></i> Send Money</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/withdraw"><i class="fa fa-wallet"></i> Withdraw Money</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/profile"><i class="fa fa-user"></i> Account</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/cardandbank"><i class="fa fa-university"></i> Cards & Bank Accounts</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/help"><i class="fas fa-hands-helping"></i> Help</a></li>
                                <li class="nav-item active"><a class="nav-link" href="/user/verification"><i class="fas fa-cog"></i>Verification</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Pages List End -->
                </aside>
                <!-- Left Panel End -->

                <div class="col-lg-9">
                    <h2 class="font-weight-400 mb-3 admin-heading">Verification Setting</h2>
                    <div class="bg-white">
                        <div class="container">
                            <div class="row">
                              <!-- Middle Panel -->
                              <div class="col-lg-12">
                                  <div class="bg-light shadow-sm rounded p-4 mb-4">
                                        @if (Session::get('success'))
                                        <div class="alert alert-success">
                                            {{Session::get('success')}}
                                        </div>
                                        @endif
                                        @if (Session::get('fail'))
                                        <div class="alert alert-danger">
                                            {{Session::get('fail')}}
                                        </div>
                                        @endif
                                      <h3 class="text-5 font-weight-400 mb-4">Verify Your ID <span class="text-muted text-4">(NID, Passport, Driving Licence)</span></h3>
                                      <div class="row" style="margin-top: 80px;">
                                        <div class="col-2"></div>
                                        <div class="col-8 text-center">
                                          <a class="btn btn-primary btn-lg btn-block text-center" href="#nidModal" role="button" data-toggle="modal">NID</a>
                                          <a class="btn btn-primary btn-lg btn-block text-center" href="#passportModal" role="button" data-toggle="modal">Passport</a>
                                          <a class="btn btn-primary btn-lg btn-block text-center" href="#drivingModal" role="button" data-toggle="modal">Driving Licence</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <!-- Middle Panel End -->
                              </div>
                            </div>
                          </div>
                          <!-- Content end -->
                          <!-- Modal -->
                          <div id="nidModal" class="modal fade" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title font-weight-400">Verification</h5>
                                    <button type="button" class="close font-weight-400" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                  </div>
                                  <div class="modal-body p-4">
                                    <form id="nidCard" method="post" action="{{route('user.uploadimage')}}" enctype="multipart/form-data">
                                      @csrf
                                      <div class="form-group">
                                        <label for="edircardNumber">Document Type</label>
                                        <div class="input-group">
                                          <div class="input-group-prepend"> </div>
                                          <input type="text" class="form-control" id="nidcard" name="documenttype" value="NID">
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="col-lg-12">
                                          <div class="form-group">
                                            <label for="frontimage">Front Image</label>
                                            <input type="file" class="form-control" id="frontimage" name="frontpic" required>
                                            <span class="text-danger">@error('frontpic'){{$message}}@enderror</span>
                                          </div>
                                        </div>
                                        <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="frontimage">Back Image</label>
                                              <input type="file" class="form-control" id="backimage" name="backpic" required>
                                              <span class="text-danger">@error('backpic'){{$message}}@enderror</span>
                                          </div>
                                        </div>
                                      </div>
                                      <button class="btn btn-primary btn-block" type="submit">Upload</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div id="passportModal" class="modal fade" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title font-weight-400">Verification</h5>
                                    <button type="button" class="close font-weight-400" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                  </div>
                                  <div class="modal-body p-4">
                                    <form id="passportCard" method="post" action="{{route('user.uploadimage')}}" enctype="multipart/form-data">
                                    @csrf
                                      <div class="form-group">
                                        <label for="edircardNumber">Document Type</label>
                                        <div class="input-group">
                                          <div class="input-group-prepend"> </div>
                                          <input type="text" class="form-control" id="passport" name="documenttype" value="Passport" >
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="col-lg-12">
                                          <div class="form-group">
                                            <label for="frontimage">Front Image</label>
                                            <input type="file" class="form-control" id="frontimage" name="frontpic" required>
                                            <span class="text-danger">@error('frontpic'){{$message}}@enderror</span>
                                          </div>
                                        </div>
                                        <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="frontimage">Back Image</label>
                                              <input type="file" class="form-control" id="backimage" name="backpic" required>
                                              <span class="text-danger">@error('backpic'){{$message}}@enderror</span>
                                          </div>
                                        </div>
                                      </div>
                                      <button class="btn btn-primary btn-block" type="submit">Upload</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div id="drivingModal" class="modal fade" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title font-weight-400">Verification</h5>
                                    <button type="button" class="close font-weight-400" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                  </div>
                                  <div class="modal-body p-4">
                                    <form id="drivingCard" method="post" action="{{route('user.uploadimage')}}" enctype="multipart/form-data">
                                      @csrf
                                      <div class="form-group">
                                        <label for="edircardNumber">Document Type</label>
                                        <div class="input-group">
                                          <div class="input-group-prepend"> </div>
                                          <input type="text" class="form-control" name="documenttype"id="drivinglicence" value="Driving Licence">
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="col-lg-12">
                                          <div class="form-group">
                                            <label for="frontimage">Front Image</label>
                                            <input type="file" class="form-control" id="frontimage" name="frontpic" required>
                                            <span class="text-danger">@error('frontpic'){{$message}}@enderror</span>
                                          </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="frontimage">Back Image</label>
                                                <input type="file" class="form-control" id="backimage" name="backpic" required>
                                                <span class="text-danger">@error('backpic'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                      </div>
                                      <button class="btn btn-primary btn-block" type="submit">Upload</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content end -->


    <!-- Footer strat -->
    <footer id="footer" style="margin-top: 30px;">
        <div class="container">
           <div class="row">
              <div class="col-md-4 footer-column">
                 <ul class="nav flex-column">
                    <li class="nav-item">
                       <span class="footer-title">Redirects</span>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="/transaction">Send Money</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="/transaction">Recieve Money</a>
                    </li>
                 </ul>
              </div>
              <div class="col-md-4 footer-column">
                 <ul class="nav flex-column">
                    <li class="nav-item">
                       <span class="footer-title">Custonmer AID</span>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="/aboutus">About us</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="/user/help">Need help?</a>
                    </li>
                 </ul>
              </div>
              <div class="col-md-4 footer-column">
                 <ul class="nav flex-column">
                    <li class="nav-item">
                       <span class="footer-title">Contact & Support</span>
                    </li>
                    <li class="nav-item">
                       <span class="nav-link"><i class="fas fa-phone"></i>+47 45 80 80 80</span>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="/contact"><i class="fas fa-envelope"></i>Contact us</a>
                    </li>
                 </ul>
              </div>
           </div>
           <div class="text-center"><i class="fas fa-ellipsis-h"></i></div>
           <div class="row text-center">
              <div class="col-md-4 box">
                 <span class="copyright quick-links">
                    Copyright &copy; MoneyTransfer <script>document.write(new Date().getFullYear())</script>
                 </span>
              </div>
              <div class="col-md-4 box">
                 <ul class="list-inline social-buttons">
                    <li class="list-inline-item">
                       <a href="#">
                       <i class="fab fa-twitter"></i>
                       </a>
                    </li>
                    <li class="list-inline-item">
                       <a href="#">
                       <i class="fab fa-facebook-f"></i>
                       </a>
                    </li>
                    <li class="list-inline-item">
                       <a href="#">
                       <i class="fab fa-instagram"></i>
                       </a>
                    </li>
                    <li class="list-inline-item">
                       <a href="#">
                       <i class="fab fa-linkedin-in"></i>
                       </a>
                    </li>
                 </ul>
              </div>
              <div class="col-md-4 box">
                 <ul class="list-inline quick-links">
                    <li class="list-inline-item">
                       <a href="#">Privacy Policy</a>
                    </li>
                    <li class="list-inline-item">
                       <a href="#">Terms of Use</a>
                    </li>
                 </ul>
              </div>
           </div>
        </div>
     </footer>
    <!-- Footer end -->

</div>
<!-- Document Wrapper end -->

<!-- Script -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

</body>
</html>

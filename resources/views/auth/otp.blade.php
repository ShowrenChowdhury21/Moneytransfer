<!doctype html>
<html class="no-js" lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>MoneyTransfer</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo/favicon.ico') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/owl.transitions.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/plugins/font-awesome/css/all.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/magnific.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/stylehome.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
   </head>
   <body>
      <div id="preloader"></div>
      <header class="header-one">
         <!-- header-area start -->
         <div id="sticker" class="header-area hidden-xs">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 col-sm-12">
                     <div class="row">
                        <!-- logo start -->
                        <div class="col-md-3 col-sm-3">
                            <div class="logo">
                               <!-- Brand -->
                               <a class="navbar-brand page-scroll white-logo" href="/home">
                               <img src="{{ asset('assets/img/logo/logo.png') }}" alt="">
                               </a>
                               <a class="navbar-brand page-scroll black-logo" href="/home">
                               <img src="{{ asset('assets/img/logo/logo3.png') }}" alt="">
                               </a>
                            </div>
                            <!-- logo end -->
                         </div>
                        <div class="col-md-9 col-sm-9" >
                           <div class="header-right-link">
                              <!-- search option end -->
                              <a class="s-menu" href="/login">Login</a>
                           </div>
                           <!-- mainmenu start -->
                           <nav class="navbar navbar-default">
                              <div class="collapse navbar-collapse" id="navbar-example">
                                 <div class="main-menu" >
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="/transaction">Send/Receive</a></li>
                                        <li><a href="/fees">Fees</a></li>
                                        <li><a href="/help">Help</a></li>
                                        <li><a href="/aboutus">About</a></li>
                                        <li><a href="/contact">Contact</a></li>
                                    </ul>
                                 </div>
                              </div>
                           </nav>
                           <!-- mainmenu end -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header-area end -->
         <!-- mobile-menu-area start -->
         <div class="mobile-menu-area hidden-lg hidden-md hidden-sm">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="mobile-menu">
                        <div class="logo">
                           <a href="/home"><img src="{{ asset('assets/img/logo/logo3.png') }}" alt="" /></a>
                        </div>
                        <nav id="dropdown">
                           <ul>
                              <li><a href="/transaction">Send/Receive</a></li>
                              <li><a href="/fees">Fees</a></li>
                              <li><a href="/help">Help</a></li>
                              <li><a href="/aboutus">About</a></li>
                              <li><a href="/contact">Contact</a></li>
                              <li><a href="/login">Login</a></li>
                              <li><a href="/signup">Sign Up</a></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- mobile-menu-area end -->
      </header>
      <!-- Header End -->
      <!-- Start Bottom Header -->
      <div class="page-area">
        <div class="breadcumb-overlay"></div>
        <div class="container">
           <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="breadcrumb text-center">
                    <div class="section-headline white-headline text-center">
                       <h3>Sign In Now</h3>
                       <p style="color:#fff;">Your Sign in information is safe with us.</p>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>

      <!-- Content-->
      <div id="content" style="margin-bottom: 70px;">
        <div class="container">
          <div class="row">
            <div class="card" style="margin-top: 50px;">
              <h3 class="font-weight-400 text-center">Please Enter OTP</h3>
              <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                <form method="post" class="digit-group" action="{{ route('auth.otpverify',['email'=>$email])}}">
                    @csrf
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
                  <div class="otp">
                    <input type="text" id="otp" name="otp" class="otp" style="text-align: center;"/>
                    <span class="text-danger">@error('otp'){{$message}}@enderror</span>
                  </div>
                  <div style="margin-top: 50px;">
                    <button class="btn btn-primary btn-block my-4" type="submit">Confirm</button>
                  </div>
                </form>
                <div style="margin-top: 30px;">
                    <form id="resendotpform" method="POST" action="{{ route('auth.resendotp',['email'=>$email])}}">
                        @csrf
                        <p class="text-3 text-muted text-center mb-0">Didn't get the code? <a class="btn-link" href="javascript:void(0)" onclick="document.getElementById('resendotpform').submit()" style="color: #413c69; align-content: center;">Resend</a></p>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Content end -->

      <!-- Footer -->
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
                       <a class="nav-link" href="/help">Need help?</a>
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
     <!-- End Footer Area -->
     <!-- js -->
     <script src="{{ asset('assets/plugins/modernizr-2.8.3.min.js') }}"></script>
     <script src="{{ asset('assets/plugins/jquery-1.12.4.min.js') }}"></script>
     <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
     <script src="{{ asset('assets/plugins/owl.carousel/owl.carousel.min.js') }}"></script>
     <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
     <script src="{{ asset('assets/js/wow.min.js') }}"></script>
     <script src="{{ asset('assets/js/jquery.stellar.min.js') }}"></script>
     <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
     <script src="{{ asset('assets/js/waypoints.js') }}"></script>
     <script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
     <script src="{{ asset('assets/js/plugins.js') }}"></script>
     <script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>
     <script src="{{ asset('assets/js/magnific.min.js') }}"></script>
     <script src="{{ asset('assets/js/mainhome.js') }}"></script>
  </body>
 </html>

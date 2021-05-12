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
      <!-- header end -->
      <!-- Start Bottom Header -->
      <div class="page-area">
         <div class="breadcumb-overlay"></div>
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="breadcrumb text-center">
                     <div class="section-headline white-headline text-center">
                        <h3>MoneyTransfer charges the lowest fees</h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- END Header -->
      <!-- Team area start -->
      <div class="faq-area fix area-padding-2">
         <div class="container">
            <div class="row">
               <div class="support-all">
                  <!-- Start services -->
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <div class="support-services wow ">
                        <a class="support-images" href="#"> <i class="fas fa-download"></i></a>
                        <div class="support-content">
                           <h4>Withdrawal Funds</h4>
                           <p>You can easily withdraw funds to your local bank account in local currency at excellent rates.</p>
                           <div class="text-primary text-10 pt-3 pb-4 mb-2">up to 1.5%</div>
                        </div>
                     </div>
                  </div>
                  <!-- Start services -->
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <div class="support-services ">
                        <a class="support-images" href="#"><i class="fas fa-upload"></i></a>
                        <div class="support-content">
                           <h4>Deposit Funds</h4>
                           <p>With a wide variety of options for deposit your account. There is always an option that is right for you.</p>
                           <div class="text-primary text-10 pt-3 pb-4 mb-2">up to 1.0%</div>
                        </div>
                     </div>
                  </div>
                  <!-- Start services -->
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <div class="support-services ">
                        <a class="support-images" href="#"><i class="fas fa-hand-holding-usd"></i></a>
                        <div class="support-content">
                           <h4>Receive Money</h4>
                           <p>Receiving money is always free of charge</p>
                           <div class="text-primary text-10 pt-3 pb-4 mb-2">Free</div>
                        </div>
                     </div>
                  </div>
                  <!-- Start services -->
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <div class="support-services">
                        <a class="support-images" href="#"><i class="fas fa-file-invoice-dollar"></i></a>
                        <div class="support-content">
                           <h4>Send Money</h4>
                           <p>ou can easily make payments at excellent rates.</p>
                           <div class="text-primary text-10 pt-3 pb-4 mb-2">up to 1.0%</div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- team area end -->
      <!-- Start Banner Area -->
      <div class="banner-area area-padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="banner-all area-80 text-center">
                     <div class="banner-content">
                        <h3>Our worldwide integration partner work with long time relationship </h3>
                        <a class="banner-btn" href="/signup">Open new account</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End Banner Area -->
      <!-- Start Footer Area -->
      <!-- Footer end -->
      </div>
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

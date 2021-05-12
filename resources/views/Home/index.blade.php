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
      <!-- Start Slider Area -->
      <div class="slider slide-area" id="slider1">
            <!-- Slides -->
            @foreach ($sliders as $slider)
                <div style="background: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url({{ URL::asset('uploads/admin/site/img/'.$slider->image) }}) no-repeat scroll top center / cover;">
                    <h2 class="title2" style="margin-left: 100px; margin-top: 200px;">Move money Save and Secure</h2>
                    <p class="title3" style="margin-left: 100px; ">Send, receive and request money online with MoneyTransfer securely, quickly and easily.</p>
                    <a href="/signup"  class="ready-btn left-btn" style="margin-left: 100px;">Get started</a>
                    <a href="https://www.youtube.com/watch?v=lmbshsLeQgY" class=" ready-btn left-btn video-play vid-zone video-content"> <i class="fa fa-play"></i> </a>
                </div>
            @endforeach
            <!-- The Arrows -->
            <i class="left" class="arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"></path></svg></i>
            <i class="right" class="arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" transform="translate(100, 100) rotate(180) "></path></svg></i>
      </div>
      <!-- End Slider Area -->
      <!-- Start How to area -->
      <div class="how-to-area area-padding">
         <div class="container">
            <div class="row">
               <div class="all-services">
                  <!-- single-well end-->
                  <div class="col-md-4 col-sm-4 col-xs-12">
                     <div class="well-services first-item">
                        <div class="well-img">
                           <a class="big-icon" href="#"><i class="flaticon-user-12"></i></a>
                        </div>
                        <div class="main-wel">
                           <div class="wel-content">
                              <h4><span>01.</span>Creat an account</h4>
                              <p>Aspernatur sit adipisci quaerat unde at neque Redug Lagre dolor sit amet consectetu. Agencies to define their new business objectives and then create</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- single-well end-->
                  <div class="col-md-4 col-sm-4 col-xs-12">
                     <div class="well-services ">
                        <div class="well-img">
                           <a class="big-icon" href="#"><i class="flaticon-building"></i></a>
                        </div>
                        <div class="main-wel">
                           <div class="wel-content">
                              <h4><span>02.</span>Deposit</h4>
                              <p>Aspernatur sit adipisci quaerat unde at neque Redug Lagre dolor sit amet consectetu. Agencies to define their new business objectives and then create</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- single-well end-->
                  <div class="col-md-4 col-sm-4 col-xs-12">
                     <div class="well-services thired-item">
                        <div class="well-img">
                           <a class="big-icon" href="#"><i class="flaticon-worldwide"></i></a>
                        </div>
                        <div class="main-wel">
                           <div class="wel-content">
                              <h4><span>03.</span>Send money</h4>
                              <p>Aspernatur sit adipisci quaerat unde at neque Redug Lagre dolor sit amet consectetu. Agencies to define their new business objectives and then create</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- single-well end-->
               </div>
            </div>
         </div>
      </div>
      <!-- End How to area -->
      <!-- Start About Area -->
      <div class="about-area bg-color fix area-padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="section-headline text-center">
                     <h3>Why choose MoneyTransfer online plateform</h3>
                     <p>Help agencies to define their new business objectives and then create professional software.</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="support-all">
                  <!-- Start services -->
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <div class="support-services wow ">
                        <a class="support-images" href="#"><i class="flaticon-like-2"></i></a>
                        <div class="support-content">
                           <h4>Professional Services</h4>
                           <p>Replacing a  maintains the amount of lines. When replacing a selection. help agencies to define their new business objectives and then create</p>
                        </div>
                     </div>
                  </div>
                  <!-- Start services -->
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <div class="support-services ">
                        <a class="support-images" href="#"><i class="flaticon-transfer-3"></i></a>
                        <div class="support-content">
                           <h4>Less costing</h4>
                           <p>Replacing a  maintains the amount of lines. When replacing a selection. help agencies to define their new business objectives and then create</p>
                        </div>
                     </div>
                  </div>
                  <!-- Start services -->
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <div class="support-services ">
                        <a class="support-images" href="#"><i class="flaticon-user-4"></i></a>
                        <div class="support-content">
                           <h4>Live Support</h4>
                           <p>Replacing a  maintains the amount of lines. When replacing a selection. help agencies to define their new business objectives and then create</p>
                        </div>
                     </div>
                  </div>
                  <!-- Start services -->
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <div class="support-services">
                        <a class="support-images" href="#"><i class="flaticon-padlock"></i></a>
                        <div class="support-content">
                           <h4>Safe & Security</h4>
                           <p>Replacing a  maintains the amount of lines. When replacing a selection. help agencies to define their new business objectives and then create</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="about-contact text-center">
                        <div class="about-btn">
                           <a class="ab-btn left-ab-btn" href="/signup">Create an account</a>
                           <a class="ab-btn right-ab-btn" href="/aboutus">More about us</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End About Area -->
      <!-- service area start -->
      <div class="services-area area-padding-2">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="section-headline text-center">
                     <h3>MoneyTransfer services worldwide</h3>
                     <p>Help agencies to define their new business objectives and then create professional software.</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="all-services">
                  <!-- single-well end-->
                  <div class="col-md-3 col-sm-6 col-xs-12">
                     <div class="single-service ">
                        <div class="service-img">
                           <a class="service-icon" href="#"><i class="flaticon-transfer-1"></i></a>
                        </div>
                        <div class="main-service">
                           <div class="service-content">
                              <h4>Money Transfer</h4>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- single-well end-->
                  <div class="col-md-3 col-sm-6 col-xs-12">
                     <div class="single-service ">
                        <div class="service-img">
                           <a class="service-icon" href="#"><i class="flaticon-piggy-bank"></i></a>
                        </div>
                        <div class="main-service">
                           <div class="service-content">
                              <h4>Bank Withdraw</h4>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- single-well end-->
                  <div class="col-md-3 col-sm-6 col-xs-12">
                     <div class="single-service ">
                        <div class="service-img">
                           <a class="service-icon" href="#"><i class="flaticon-smartphone"></i></a>
                        </div>
                        <div class="main-service">
                           <div class="service-content">
                              <h4>Online Deposit</h4>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- single-well end-->
                  <div class="col-md-3 col-sm-6 col-xs-12">
                     <div class="single-service ">
                        <div class="service-img">
                           <a class="service-icon" href="#"><i class="flaticon-shopping-bag-1"></i></a>
                        </div>
                        <div class="main-service">
                           <div class="service-content">
                              <h4>Online payment</h4>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- single-well end-->
               </div>
            </div>
         </div>
      </div>
      <!-- End service area End -->
      <!-- Start Feature Area -->
      <div class="feature-area bg-color fix area-padding">
         <div class="container">
            <div class="row margin-row">
               <div class="col-md-6 col-sm-6 hidden-xs">
                  <div class="feature-text">
                     <h3>Easily send and recieve money</h3>
                     <p>Replacing a  maintains the amount of lines. When replacing a selection. help agencies to define their new business objectives and then create</p>
                     <ul>
                        <li><a href="#">Innovation idea latest business tecnology</a></li>
                        <li><a href="#">Digital content marketing online clients plateform</a></li>
                        <li><a href="#">Safe secure services for you online email account</a></li>
                     </ul>
                     <a class="feature-btn" href="/aboutus">Learn more about us</a>
                  </div>
               </div>
               <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="feature-content">
                     <div class="feature-images">
                        <img src="{{ asset('assets/img/feature/f2.png') }}" alt="">
                     </div>
                  </div>
               </div>
               <div class="hidden-md hidden-lg hidden-sm col-xs-12">
                  <div class="feature-text">
                     <h3>Easily send and recieve money</h3>
                     <p>Replacing a  maintains the amount of lines. When replacing a selection. help agencies to define their new business objectives and then create</p>
                     <ul>
                        <li><a href="#">Innovation idea latest business tecnology</a></li>
                        <li><a href="#">Digital content marketing online clients plateform</a></li>
                        <li><a href="#">Safe secure services for you online email account</a></li>
                     </ul>
                     <a class="feature-btn" href="/aboutus">Learn more</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End Feature Area -->
      <!-- Start brand Banner area -->
      <div class="brand-area area-padding fix" data-stellar-background-ratio="0.6">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="brand-text text-center">
                     <h3> We accept deposits from</h3>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="brand-area-content">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="brand-content">
                     <div class="brand-items">
                        <div class="row">
                            @foreach ($clients as $client)
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="single-service ">
                                    <div class="service-img">
                                        <a href="#"><img src="{{ asset('uploads/admin/site/img/'.$client->image) }}" alt="" style="height: 150px;"></a>
                                    </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a class="hire-btn" href="/signup">Get started</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- End brand Banner area -->
         <!-- Core feature start -->
         <div class="core-feature-area bg-color area-padding-2">
            <div class="container">
               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="section-headline text-center">
                        <h3>MoneyTransfer core feature</h3>
                        <p>Help agencies to define their new business objectives and then create professional software.</p>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="all-core-feature">
                     <!-- single-well end-->
                     <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="core-feature ">
                           <div class="core-img">
                              <a class="core-icon" href="#"><i class="flaticon-target"></i></a>
                           </div>
                           <div class="main-core">
                              <div class="core-content">
                                 <h4>Create Account Easily</h4>
                                 <p>Aspernatur sit adipisci quaerat unde at neque Redug Lagre dolor sit amet consectetu.</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- single-well end-->
                     <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="core-feature ">
                           <div class="core-img">
                              <a class="core-icon" href="#"><i class="flaticon-speech-bubble"></i></a>
                           </div>
                           <div class="main-core">
                              <div class="core-content">
                                 <h4>Easy Transaction</h4>
                                 <p>Aspernatur sit adipisci quaerat unde at neque Redug Lagre dolor sit amet consectetu.</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- single-well end-->
                     <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="core-feature ">
                           <div class="core-img">
                              <a class="core-icon" href="#"><i class="flaticon-transfer"></i></a>
                           </div>
                           <div class="main-core">
                              <div class="core-content">
                                 <h4>Simple Deposit</h4>
                                 <p>Aspernatur sit adipisci quaerat unde at neque Redug Lagre dolor sit amet consectetu.</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- single-well end-->
                     <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="core-feature ">
                           <div class="core-img">
                              <a class="core-icon" href="#"><i class="flaticon-smartphone"></i></a>
                           </div>
                           <div class="main-core">
                              <div class="core-content">
                                 <h4>Simple Withdraw</h4>
                                 <p>Aspernatur sit adipisci quaerat unde at neque Redug Lagre dolor sit amet consectetu.</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- single-well end-->
                     <div class="col-md-offset-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="core-feature ">
                           <div class="core-img">
                              <a class="core-icon" href="#"><i class="flaticon-settings-2"></i></a>
                           </div>
                           <div class="main-core">
                              <div class="core-content">
                                 <h4>Profile Management</h4>
                                 <p>Aspernatur sit adipisci quaerat unde at neque Redug Lagre dolor sit amet consectetu.</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- single-well end-->
                     <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="core-feature ">
                           <div class="core-img">
                              <a class="core-icon" href="#"><i class="flaticon-user-8"></i></a>
                           </div>
                           <div class="main-core">
                              <div class="core-content">
                                 <h4>Support manager</h4>
                                 <p>Aspernatur sit adipisci quaerat unde at neque Redug Lagre dolor sit amet consectetu.</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- single-well end-->
                  </div>
               </div>
            </div>
         </div>
         <!-- Core feature End -->
         <!-- Start Download area -->
         <div class="download-area area-padding">
            <div class="container">
               <div class="row">
                  <!-- Start Column -->
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <div class="download-image">
                        <img src="{{ asset('assets/img/about/ab1.png') }}" alt="download-image">
                     </div>
                  </div>
                  <!-- End Column -->
                  <!-- Start Column -->
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <div class="download-text">
                        <h3>Download our apps of your mobile phone for service</h3>
                        <p>Replacing a  maintains the amount of lines. When replacing a selection. help agencies to define their new business objectives and then createReplacing a  maintains the amount of lines. When replacing a selection. help agencies to define their new business objectives and then createReplacing a  maintains the amount of lines. When replacing a selection. help agencies to define their new business objectives and then create</p>
                        <div class="down-btn" data-wow-delay="0.7s">
                           <a href="#" class="app-btn left-btn">Play store</a>
                           <a href="#" class="app-btn right-btn">App store</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- End Download area -->
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

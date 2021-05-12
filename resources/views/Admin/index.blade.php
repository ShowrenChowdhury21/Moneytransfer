<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>MoneyTransfer - Admin</title>
      <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />
      <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo/favicon.ico') }}">
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/font-awesome/css/font-awesome.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/et-line-font/et-line-font.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/themify-icons/themify-icons.css') }}">
   </head>
   <body class="hold-transition skin-blue sidebar-mini">
      <!-- Preloader -->
      <div id="preloader">
         <div data-loader="dual-ring"></div>
      </div>
      <div id="main-wrapper">
      <div class="wrapper boxed-wrapper">
         <header class="main-header">
            <nav class="navbar blue-bg navbar-static-top">
               <!-- Logo -->
               <a class="logo d-inline-flex" href="#">
                  <img src="{{ asset('assets/img/logo/logo.png') }}" alt="">
               </a>
               <!-- Sidebar toggle button-->
               <ul class="nav navbar-nav pull-left">
                  <li><a class="sidebar-toggle" data-toggle="push-menu" href=""></a> </li>
               </ul>
               <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                     <!-- User Account -->
                     <li class="dropdown user user-menu p-ph-res">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span >{{Session::get('name')}}</span> </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                               {{-- <div class="pull-left user-img"><img src="{{ asset('assets/img/img1.jpg') }}" class="img-responsive" alt="User"></div> --}}
                               <p class="text-left" style="font-size: 20px;">{{Session::get('name')}} <small Style="font-size: 10px;">{{Session::get('email')}}</small> </p>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/admin/myaccount"><i class="fa fa-user-o" aria-hidden="true"></i> My Account</a></li>
                            <li><a href="/admin/inbox"><i class="fa fa-envelope-o" aria-hidden="true"></i> Inbox</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/admin/sitesettings"><i class="fa fa-cogs" aria-hidden="true"></i> Site Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/login"><i class="fa fa-power-off"></i> Log Out</a></li>
                         </ul>
                     </li>
                  </ul>
               </div>
            </nav>
         </header>
         <!-- Left side column. contains the logo and sidebar -->
         <aside class="main-sidebar">
            <!-- sidebar: -->
            <div class="sidebar">
               <!-- Sidebar user panel -->
               <div class="user-panel">
                  <div class="detail" style="padding-top: 80px;">
                      <h4 class="text-center">{{Session::get('name')}}</h4>
                      <h6 class="text-center"> ID:{{Session::get('id')}}</h6>
                  </div>
                  <div class="info" style="padding: 10px 0px 10px 40px;">
                     <a style="padding: 10px; font-size: 20px; color: #fff;" href="/admin/myaccount" title="Settings"><i class="fa fa-cog"></i></a>
                     <a style="padding: 10px; font-size: 20px; color: #fff;" href="/admin/inbox" title="Inbox"><i class="fa fa-envelope-o"></i></a>
                     <a style="padding: 10px; font-size: 20px; color: #fff;" href="/login" title="Sign out"><i class="fa fa-power-off"></i></a>
                  </div>
               </div>
               <!-- sidebar menu -->
               <ul class="sidebar-menu" data-widget="tree">
                  <li class="header">Overview</li>
                  <li class="active treeview" onclick="location.href='/admin/dashboard';">
                     <a href="#"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> <span class="pull-right-container"></span> </a></li>
                  <li class="header">Applications</li>
                  <li class=" treeview">
                     <a href="#"> <i class="fa fa-bullseye"></i> <span>Users</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                     <ul class="treeview-menu">
                     <li><a href="/admin/usermanagement">User Management</a></li>
                     <li><a href="/admin/userverification">User Verification</a></li>
                     <li><a href="/admin/cardrequests">Card Requests</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#"> <i class="fa fa-money "></i> <span>Transactions</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                     <ul class="treeview-menu">
                     <li><a href="/admin/withdraws">Withdraws</a></li>
                     <li><a href="/admin/sendmoney">Send Money</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#"> <i class="fa fa-support "></i> <span>Customer AID</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                     <ul class="treeview-menu">
                     <li><a href="/admin/sendmessage">Send Message</a></li>
                     <li> <a href="/admin/inbox">Inbox</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#"> <i class="fa fa-cogs"></i> <span>Settings</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                     <ul class="treeview-menu">
                     <li><a href="/admin/myaccount">My account</a></li>
                     <li><a href="/admin/sitesettings">Site Settings</a></li>
                     </ul>
                  </li>
               </ul>
            </div>
            <!-- /.sidebar -->
         </aside>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header-->
            <div class="content-header sty-one">
               <h1>Dashboard</h1>
               <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><i class="fa fa-angle-right"></i> Dashboard</li>
               </ol>
            </div>
            <!-- Main content -->
            <div class="content">
               <!-- Small boxes-->
               <div class="row">
                  <div class="col-lg-4 col-sm-6 col-xs-12">
                     <div class="info-box bg-warning">
                        <span class="info-box-icon bg-transparent"><i class="fa fa-line-chart text-white" aria-hidden="true"></i></span>
                        <div class="info-box-content">
                           <h6 class="info-box-text text-white">Total Visitors</h6>
                           <h1 class="text-white">{{$count}}</h1>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-sm-6 col-xs-12">
                     <div class="info-box bg-darkblue">
                        <span class="info-box-icon bg-transparent"><i class="fa fa-bar-chart text-white" aria-hidden="true"></i></span>
                        <div class="info-box-content">
                           <h6 class="info-box-text text-white">Total Customers</h6>
                           <h1 class="text-white">{{$count}}</h1>
                           <span class="progress-description text-white"> {{$countlastthirty}} in last 30 Days </span>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-sm-6 col-xs-12">
                     <div class="info-box bg-green text-white">
                        <span class="info-box-icon bg-transparent"><i class="fa fa-money text-white" aria-hidden="true"></i></span>
                        <div class="info-box-content">
                           <h6 class="info-box-text text-white">Total Transactions</h6>
                           <h1 class="text-white">{{$counttrans}}</h1>
                           <span class="progress-description text-white"> {{$counttranslastthirty}} in 30 Days </span>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-sm-6 col-xs-12">
                     <div class="info-box bg-aqua">
                        <span class="info-box-icon bg-transparent"><i class="fa fa-clock-o text-white" aria-hidden="true"></i></span>
                        <div class="info-box-content">
                           <h6 class="info-box-text text-white">Pending Withdrawal</h6>
                           <h1 class="text-white">{{$pendingwithdraw}}</h1>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-sm-6 col-xs-12">
                     <div class="info-box bg-orange">
                        <span class="info-box-icon bg-transparent"><i class="fa fa-credit-card-alt text-white" aria-hidden="true"></i></span>
                        <div class="info-box-content">
                           <h6 class="info-box-text text-white">Deposit Made</h6>
                           <h1 class="text-white">USD {{ $totaldeposit}}</h1>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-sm-6 col-xs-12">
                     <div class="info-box bg-purple">
                        <span class="info-box-icon bg-transparent"><i class="fa fa-outdent text-white" aria-hidden="true"></i></span>
                        <div class="info-box-content">
                           <h6 class="info-box-text text-white">Withdrawal Made</h6>
                           <h1 class="text-white">USD {{$totalwithdraw}}</h1>
                        </div>
                     </div>
                  </div>
               </div>

               <!-- Graph -->
               <div class="row">
                <div class="col-lg-12 col-xlg-9">
                   <div class="info-box" data-sortable-id = "chart-js-1">
                      <div class="d-flex flex-wrap">
                         <div>
                            <h4 class="text-black">Analytical Overview<h6>(User growth regarding months)</h6></h4>
                         </div>
                         <div class="ml-auto">
                            <ul class="list-inline">
                               <li class="text-blue"> <i class="fa fa-circle"></i> User Growth</li>
                            </ul>
                         </div>
                      </div>
                      <div>
                         <canvas id="line-chart" data-render="chart-js"></canvas>
                      </div>
                   </div>
                </div>
             </div>
               <!-- content -->
            </div>
         </div>
      </div>
      </div>
      <!-- wrapper -->
      <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('assets/js/niche.js') }}"></script>
      <script src="{{ asset('assets/js/main.js') }}"></script>
      <script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>
      <script>
          $(function() {
            var lineChartData = {
              labels: @json($months),
              datasets: [{
                  label: "Users",
                  borderColor: 'rgb(0,0,139)',
                  pointBackgroundColor: 'rgb(0,0,139)',
                  pointRadius: 2,
                  borderWidth: 2,
                  backgroundColor: 'rgba(0,0,139,0.3)',
                  data: @json($monthly_user_values)
              }]
            };
            console.log(lineChartData);

            var ctx = document.getElementById('line-chart').getContext('2d');
            var chart = new Chart(ctx,{
                type: 'line',
                data: lineChartData,
                options:
                {
                    responsive: true
                }
            });
        });
      </script>
    </body>
</html>

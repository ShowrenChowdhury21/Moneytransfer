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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span>{{Session::get('name')}}</span> </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                               <p class="text-left" style="font-size: 20px;">{{Session::get('name')}} <small Style="font-size: 10px;">{{Session::get('email')}}</small> </p>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/admin/myaccount"><i class="fa fa-user-o" aria-hidden="true"></i> My Account</a></li>
                            <li><a href="/admin/inbox"><i class="fa fa-envelope-o" aria-hidden="true"></i> Inbox</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/admin/sitesettings"><i class="fa fa-cogs" aria-hidden="true"></i> Site Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/login"><i class="fa fa-power-off"></i> Logout</a></li>
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
                  <div class="detail"  style="padding-top: 80px;">
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
                  <li class=" treeview" onclick="location.href='/admin/dashboard';">
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
                  <li class=" active treeview">
                     <a href="#"> <i class="fa fa-cogs"></i> <span>Settings</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                     <ul class="treeview-menu">
                     <li class="active"><a href="/admin/myaccount">My account</a></li>
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
               <h1>My Account</h1>
               <ol class="breadcrumb">
                  <li><a href="#">Settings</a></li>
                  <li><i class="fa fa-angle-right"></i> My account</li>
               </ol>
            </div>
            <!-- Main content -->
            <div class="content">
               <div class="info-box">
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
                  <h4 class="text-black">My account</h4>
                  <div class="col-lg-12">
                     <!-- Personal Details -->
                     <div class="bg-light shadow-sm rounded p-4 mb-4">
                       <h3 class="text-5 font-weight-400 mb-3">Personal Details <a href="#edit-personal-details" data-toggle="modal" class="float-right text-1 text-uppercase text-muted btn-link"><i class="fa fa-edit mr-1"></i>Edit</a></h3>
                       <div class="row">
                         <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                         <p class="col-sm-9">{{Session::get('name')}}</p>
                       </div>
                       <div class="row">
                         <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Country</p>
                         <p class="col-sm-9">{{Session::get('country')}}</p>
                       </div>
                     </div>
                     <!-- Edit Details Modal-->
                     <div id="edit-personal-details" class="modal fade " role="dialog" aria-hidden="true">
                       <div class="modal-dialog modal-dialog-centered" role="document">
                         <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title font-weight-400">Personal Details</h5>
                             <button type="button" class="close font-weight-400" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                           </div>
                           <div class="modal-body p-4">
                             <form id="personaldetails" method="post" action="/admin/myaccount/personaldatachange">
                                @csrf
                               <div class="row">
                                 <div class="col-12 col-sm-12">
                                   <div class="form-group">
                                     <label for="firstName">Name</label>
                                     <input type="text" value="{{Session::get('name')}}" class="form-control" data-bv-field="firstName" id="name" name="name" required placeholder="Enter Name...">
                                     <span class="text-danger">@error('name'){{$message}}@enderror</span>
                                    </div>
                                 </div>
                               </div>
                               <button class="btn btn-primary btn-block mt-2" type="submit">Save Changes</button>
                             </form>
                           </div>
                         </div>
                       </div>
                     </div>
                     <!-- Personal Details End -->

                     <!-- Email Addresses-->
                     <div class="bg-light shadow-sm rounded p-4 mb-4">
                       <h3 class="text-5 font-weight-400 mb-3">Email Address <a href="#edit-email" data-toggle="modal" class="float-right text-1 text-uppercase text-muted btn-link"><i class="fa fa-edit mr-1"></i>Edit</a></h3>
                       <div class="row">
                         <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Email <span class="text-muted font-weight-500">(Primary)</span></p>
                         <p class="col-sm-9">{{Session::get('email')}}</p>
                       </div>
                     </div>
                     <!-- Edit Details Modal-->
                     <div id="edit-email" class="modal fade " role="dialog" aria-hidden="true">
                       <div class="modal-dialog modal-dialog-centered" role="document">
                         <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title font-weight-400">Email Address</h5>
                             <button type="button" class="close font-weight-400" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                           </div>
                           <div class="modal-body p-4">
                             <form id="emailAddresses" method="post" action="/admin/myaccount/emailchange">
                                @csrf
                               <div class="row">
                                 <div class="col-12">
                                   <div class="form-group">
                                     <label for="emailID">Email <span class="text-muted font-weight-500">(Primary)</span></label>
                                     <input type="text" value="{{Session::get('email')}}" class="form-control" data-bv-field="emailid" id="emailID" name="email" required placeholder="Email ID">
                                     <span class="text-danger">@error('email'){{$message}}@enderror</span>
                                    </div>
                                 </div>
                               </div>
                               <button class="btn btn-primary btn-block" type="submit">Save Changes</button>
                             </form>
                           </div>
                         </div>
                       </div>
                     </div>
                     <!-- Email Addresses End -->

                     <!-- Phone -->
                     <div class="bg-light shadow-sm rounded p-4 mb-4">
                       <h3 class="text-5 font-weight-400 mb-3">Currency </h3>
                       <div class="row">
                         <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Currency <span class="text-muted font-weight-500">(Initial)</span></p>
                         <p class="col-sm-9">{{Session::get('currency')}}</p>
                       </div>
                     </div>

                     <!-- Security -->
                     <div class="bg-light shadow-sm rounded p-4">
                       <h3 class="text-5 font-weight-400 mb-3">Security <a href="#change-password" data-toggle="modal" class="float-right text-1 text-uppercase text-muted btn-link"><i class="fa fa-edit mr-1"></i>Edit</a></h3>
                       <div class="row">
                         <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">
                           <label class="col-form-label">Password</label>
                         </p>
                         <p class="col-sm-9">
                           <input type="password" class="form-control-plaintext" data-bv-field="password" id="password" value="EnterPassword">
                         </p>
                       </div>
                     </div>
                     <!-- Edit Details Modal-->
                     <div id="change-password" class="modal fade " role="dialog" aria-hidden="true">
                       <div class="modal-dialog modal-dialog-centered" role="document">
                         <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title font-weight-400">Change Password</h5>
                             <button type="button" class="close font-weight-400" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                           </div>
                           <div class="modal-body p-4">
                             <form id="changePassword" method="post" action="/admin/myaccount/passwordchange">
                                @csrf
                               <div class="form-group">
                                 <label for="existingPassword">Confirm Current Password</label>
                                 <input type="password" class="form-control"  id="currentpassword" name="currentpassword" required placeholder="Enter Current Password">
                                 <span class="text-danger">@error('currentpassword'){{$message}}@enderror</span>
                                </div>
                               <div class="form-group">
                                 <label for="newPassword">New Password</label>
                                 <input type="password" class="form-control"  id="newpassword" name="newpassword" required placeholder="Enter New Password">
                                 <span class="text-danger">@error('newpassword'){{$message}}@enderror</span>
                                </div>
                               <div class="form-group">
                                 <label for="confirmPassword">Confirm New Password</label>
                                 <input type="password" class="form-control"  id="confirmnewpassword" name="confirmnewpassword" required placeholder="Enter Confirm New Password">
                                 <span class="text-danger">@error('confirmnewpassword'){{$message}}@enderror</span>
                                </div>
                               <button class="btn btn-primary btn-block mt-4" type="submit">Update Password</button>
                             </form>
                           </div>
                         </div>
                       </div>
                     </div>
                     <!-- Security End -->
                   </div>
               </div>
            <!-- content -->
            </div>
         </div>
      </div>
      <!-- wrapper -->
      <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('assets/js/niche.js') }}"></script>
      <script src="{{ asset('assets/js/main.js') }}"></script>
   </body>
</html>

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
      <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-switch/bootstrap-switch.css') }}">
      <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/css/dataTables.bootstrap.min.css') }}">
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
                  <li class="treeview" onclick="location.href='/admin/dashboard';">
                     <a href="#"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> <span class="pull-right-container"></span> </a></li>
                  <li class="header">Applications</li>
                  <li class="active treeview">
                     <a href="#"> <i class="fa fa-bullseye"></i> <span>Users</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                     <ul class="treeview-menu">
                     <li><a href="/admin/usermanagement">User Management</a></li>
                     <li><a href="/admin/userverification">User Verification</a></li>
                     <li class="active"><a href="/admin/cardrequests">Card Requests</a></li>
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
                  <li class=" treeview">
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
               <h1>User Verification</h1>
               <ol class="breadcrumb">
                  <li><a href="#">Users</a></li>
                  <li><i class="fa fa-angle-right"></i> User verification</li>
               </ol>
            </div>
            <!-- Main content -->
            <div class="content">
               <div class="info-box">
                  <h4 class="text-black">User Verification</h4>
                  <div class="table-responsive">
                     <table id="example1" class="table table-bordered table-striped">
                           <thead>
                            <tr>
                              <th style="min-width:55px;">Name</th>
                              <th style="min-width:80px;">Email</th>
                              <th style="min-width:80px;">CardNo</th>
                              <th style="min-width:50px;">cardcode</th>
                              <th style="min-width:50px;">expiredate</th>
                              <th style="min-width:100px;">Address</th>
                              <th style="min-width:20px;">Actions</th>
                            </tr>
                           </thead>
                            <tbody>
                                @foreach($usercards as $key => $usercard)
                                <tr>
                                <td>{{$usercard->name}}</td>
                                <td>{{$usercard->email}}</td>
                                <td>{{$usercard->cardno}}</td>
                                <td>{{$usercard->cardcode}}</td>
                                <td>{{$usercard->expiredate}}</td>
                                <td>{{$usercard->address}}</td>
                                <td>{{$usercard->state}}</td>
                                <td>
                                    <a href="#viewuserModal" class="view" data-toggle="modal"><i class="fa fa-user-o" aria-hidden="true" style="font-size: 25px; padding-left: 15px;"></i></a>
                                    <a href="#edituserModal" class="edit" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size: 25px;  padding-left: 15px;"></i></a>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                        </div>
                     </div>
                     <!--Modal-->
                     <div id="viewuserModal" class="modal fade" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h4 class="modal-title">User Details</h4>
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              </div>
                              <div class="modal-body">
                                 <div class="container">
                                       <div class="col-md-12">
                                          <label>Name</label>
                                          <input type="text" name="name" id="nameview" class="form-control" disabled>
                                       </div>
                                       <div class="col-md-12">
                                          <label>Email</label>
                                          <input type="text" name="email" id="emailview" class="form-control" disabled>
                                       </div>
                                       <div class="col-md-12">
                                          <label>Card Number</label>
                                          <input type="text" name="cardno" id="cardno" class="form-control" disabled>
                                       </div>
                                       <div class="col-md-12">
                                            <label>Card Code</label>
                                            <input type="text" name="cardcode" id="cardcode" class="form-control" disabled>
                                         </div>
                                         <div class="col-md-12">
                                            <label>Expire Date</label>
                                            <input type="text" name="expiredate" id="expiredate" class="form-control" disabled>
                                         </div>
                                       <div class="col-md-12">
                                        <label>Address</label>
                                        <input type="text" name="address" id="address" class="form-control" disabled>
                                     </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="edituserModal" class="modal fade">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <form action = "/admin/withdraws/updatestate/" method = "post" id="editform">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title">Withdrawal Decision</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 </div>
                                 <div class="modal-body">
                                    <div class="form-group">
                                       <input type="hidden" name="carduserid" id="carduserid" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                       <label>Status</label>
                                       <div class="input-group">
                                        <select class="form-control" id="status" name="status" aria-label="Default select example">
                                            <option selected value="Pending">Pending</option>
                                            <option value="accepted">Accepted</option>
                                            <option value="declined">Declined</option>
                                        </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                    <input type="submit" class="btn btn-info" value="Save">
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                </div>
            <!-- content -->
            {!! $usercards->links() !!}
            </div>
         </div>
      </div>
      <!-- wrapper -->
      <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('assets/js/niche.js') }}"></script>
      <script src="{{ asset('assets/js/main.js') }}"></script>
      <script src="{{ asset('assets/plugins/bootstrap-switch/bootstrap-switch.js') }}"></script>
      <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
      <script src="{{ asset('assets/plugins/bootstrap-switch/highlight.js') }}"></script>
      <script src="{{ asset('assets/plugins/bootstrap-switch/main.js') }}"></script>
      <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
      <script>
         $(function () {
           $('#example1').DataTable({
             'paging'      : false,
             'lengthChange': false,
             'searching'   : true,
             'ordering'    : true,
             'info'        : true,
             'autoWidth'   : false
           })
         })

       </script>
       <script>
        $(document).ready(function(){
                $(".view").on('click',function(){
                    $tr = $(this).closest('tr');
                    var editdata = $tr.children('td').map(function(){
                        return $(this).text();
                    }).get();

                    $('#nameview').val(editdata[0]);
                    $('#emailview').val(editdata[1]);
                    $('#cardno').val(editdata[2]);
                    $('#cardcode').val(editdata[3]);
                    $('#expiredate').val(editdata[4]);
                    $('#address').val(editdata[5]);
                });
        });
        $(document).ready(function(){
             $(".edit").on('click',function(){
                 $tr = $(this).closest('tr');
                 var editdata = $tr.children('td').map(function(){
                     return $(this).text();
                 }).get();

                 $('#carduserid').val(editdata[2]);
                 $('#editform').attr('action','/admin/cardrequests/updatecardrequests/'+editdata[2]);
             });
         });
     </script>
   </body>
</html>

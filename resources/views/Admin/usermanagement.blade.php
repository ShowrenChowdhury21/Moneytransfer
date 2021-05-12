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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span>{{Session::get('name')}}</span> </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                               <p class="text-left" style="font-size: 20px;">{{Session::get('name')}}<small Style="font-size: 10px;">{{Session::get('email')}}</small> </p>
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
                     <li class="active"><a href="/admin/usermanagement">User Management</a></li>
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
               <h1>User Management</h1>
               <ol class="breadcrumb">
                  <li><a href="#">Users</a></li>
                  <li><i class="fa fa-angle-right"></i> User Management</li>
               </ol>
            </div>
            <!-- Main content -->
            <div class="content">
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
               <div class="info-box">
                  <h4 class="text-black">User Verification</h4>
                  <div class="table-responsive">
                     <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th style="min-width:45px;">ID</th>
                                 <th >Name</th>
                                 <th style="max-width:80px;">Email</th>
                                 <th >Country</th>
                                 <th >Currency</th>
                                 <th >Balance</th>
                                 <th style="min-width:50px;">Status</th>
                                 <th style="min-width:120px;">Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                                @foreach($users as $key => $user)
                                <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->country}}</td>
                                <td>{{$user->currency}}</td>
                                <td>{{$user->balance}}</td>
                                <td><span class="label label-success">{{$user->status}}</span></td>
                                 <td class="actions">
                                    <a href="#viewuserModal" class="view" data-toggle="modal"><i class="fa fa-user-o" aria-hidden="true" style="font-size: 25px; padding-left: 15px;"></i></a>
                                    <a href="#edituserModal" class="edit" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size: 25px;  padding-left: 15px;"></i></a>
                                    <a href="#deleteuserModal" class="delete" data-toggle="modal"><i class="fa fa-trash-o " aria-hidden="true" style="font-size: 25px;  padding-left: 15px;"></i></a>
                                 </td>
                                </tr>
                                @endforeach
                           </tbody>
                        </table>
                     </div>
                     </div>
                     <!-- Modal HTML -->
                     <div id="viewuserModal" class="modal fade" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h4 class="modal-title">User Details</h4>
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              </div>
                              <div class="modal-body">
                                 <div class="container">
                                    <div class="row">
                                       <div class="col-xs-12 col-md-6 px-0">
                                          <label>ID</label>
                                          <input type="text" name="id" id="id" class="form-control" disabled>
                                          <label>Name</label>
                                          <input type="text" name="name" id="nameview" class="form-control" disabled>
                                          <label>Email</label>
                                          <input type="text" name="email" id="emailview" class="form-control" disabled>
                                       </div>
                                       <div class="col-md-1"></div>
                                       <div class="col-xs-12 col-md-5 px-0">
                                          <label>Country</label>
                                          <input type="text" name="country" id="country" class="form-control" disabled>
                                          <label>Currency</label>
                                          <input type="text" name="currency" id="currency" class="form-control" disabled>
                                          <label>Balance</label>
                                          <input type="text" name="balance" id="balance" class="form-control" disabled>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Edit Modal HTML -->
                     <div id="edituserModal" class="modal fade">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <form action = "/admin/usermanagement/updateuser" method = "post" id="editform">
                                @csrf
                                 <div class="modal-header">
                                    <h4 class="modal-title">Edit User</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 </div>
                                 <div class="modal-body">
                                    <div class="form-group">
                                       <label>Name</label>
                                       <input type="text" name="name" id="name" class="form-control" required>
                                       <span class="text-danger">@error('name'){{$message}}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                       <label>Email</label>
                                       <input type="email" name="email" id="email" class="form-control" required>
                                       <span class="text-danger">@error('email'){{$message}}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                       <label>Status</label>
                                       <div class="input-group">
                                        <select class="form-control" id="status" name="status" aria-label="Default select example">
                                            <option selected value="active">Active</option>
                                            <option value="temporaryban">Temporarily Banned</option>
                                            <option value="disable">Disabled</option>
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
                     <!-- Delete Modal HTML -->
                     <div id="deleteuserModal" class="modal fade">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <form action = "/admin/usermanagement/deleteuser" method = "post" id="deleteform">
                                @csrf
                                 <div class="modal-header">
                                    <h4 class="modal-title">Delete Employee</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 </div>
                                 <div class="modal-body">
                                    <p>Are you sure you want to delete these Records?</p>
                                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                                 </div>
                                 <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                    <input type="submit"  id ="deletebutton" name="deletebutton" class="btn btn-danger" value="Delete">
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
               </div>
            <!-- content -->
            {!! $users->links() !!}
            </div>
         </div>
        </div>
      </div>
      <!-- wrapper -->
      <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('assets/js/niche.js') }}"></script>
      <script src="{{ asset('assets/js/main.js') }}"></script>
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

                    $('#id').val(editdata[0]);
                    $('#nameview').val(editdata[1]);
                    $('#emailview').val(editdata[2]);
                    $('#country').val(editdata[3]);
                    $('#currency').val(editdata[4]);
                    $('#balance').val(editdata[5]);
                    $('#status').val(editdata[6]);
                });
            });

            $(document).ready(function(){
                $(".edit").on('click',function(){
                    $tr = $(this).closest('tr');
                    var editdata = $tr.children('td').map(function(){
                        return $(this).text();
                    }).get();

                    $('#name').val(editdata[1]);
                    $('#email').val(editdata[2]);
                    $('#status').val(editdata[6]);
                    $('#editform').attr('action','/admin/usermanagement/updateuser/'+editdata[0]);
                });
            });


            $(document).ready(function(){
                $('tbody').on('click', 'a', function(){
                    var value_id = $(this).closest('tr').find('td').first().text();
                    $('#deleteform').attr('action','/admin/usermanagement/deleteuser/'+value_id);
                });
            });
        </script>
   </body>
</html>

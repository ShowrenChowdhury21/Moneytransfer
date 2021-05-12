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
                               {{-- <div class="pull-left user-img"><img src="{{ asset('assets/img/img1.jpg') }}" class="img-responsive" alt="User"></div> --}}
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
                  <li class="active treeview">
                     <a href="#"> <i class="fa fa-cogs"></i> <span>Settings</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                     <ul class="treeview-menu">
                     <li><a href="/admin/myaccount">My account</a></li>
                     <li class="active"><a href="/admin/sitesettings">Site Settings</a></li>
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
               <h1>Site Settings</h1>
               <ol class="breadcrumb">
                  <li><a href="#">Settings</a></li>
                  <li><i class="fa fa-angle-right"></i> Site Settings</li>
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
                  <h4 class="text-black">Site View Settings</h4>
                  <div class="table-responsive">
                     <a class="btn btn-primary" href="#addpicModal" role="button" data-toggle="modal" style="margin-top: 50px;">Add New File</a>
                     <table id="example1" class="table table-bordered table-striped">
                           <thead>
                            <tr>
                              <th style="min-width:55px;">Id</th>
                              <th style="min-width:55px;">View Page Name</th>
                              <th style="min-width:55px;">Page Section Name</th>
                              <th style="min-width:55px;">Picture type</th>
                              <th style="min-width:80px;">Image</th>
                              <th style="min-width:20px;">Actions</th>
                            </tr>
                           </thead>
                            <tbody>
                            @foreach($pics as $key => $pic)
                            <tr>
                              <td>{{$pic->id}}</td>
                              <td>{{$pic->viewpagename}}</td>
                              <td>{{$pic->pagesectionname}}</td>
                              <td>{{$pic->picturetype}}</td>
                              <td><img src="{{ asset('uploads/admin/site/img/'.$pic->image)}}" class="modal-hover-opacity" id="imageresource"  onclick="onClick(this)" alt="" style="width:70px; height:auto;"></td>
                              <td class="actions">
                                 <a href="#viewpicModal" class="view" data-toggle="modal"><i class="fa fa-user-o" aria-hidden="true" style="font-size: 25px; padding-left: 15px;"></i></a>
                                 <a href="#editpicModal" class="edit" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size: 25px;  padding-left: 15px;"></i></a>
                                 <a href="#deletepicModal" class="delete" data-toggle="modal"><i class="fa fa-trash-o " aria-hidden="true" style="font-size: 25px;  padding-left: 15px;"></i></a>
                              </td>
                            </tr>
                            @endforeach
                            </tbody>
                     </table>
                  </div>
               </div>
               <!--Modal-->
               <div id="modal01" class="modalimg" onclick="this.style.display='none'">
                <span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <div class="modal-contentimg">
                  <img id="img01" style="max-width:100%">
                </div>
              </div>

               <div id="addpicModal" class="modal fade">
                  <div class="modal-dialog">
                     <div class="modal-content">
                           <form method="post" action="/admin/sitesettings/addpic"  enctype="multipart/form-data">
                            @csrf
                              <div class="modal-header">
                                    <h4 class="modal-title">Add Picture</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              </div>
                              <div class="modal-body">
                                    <div class="form-group">
                                       <label>Page Name</label>
                                       <input type="text" name="viewpagename" class="form-control" required>
                                       <span class="text-danger">@error('viewpagename'){{$message}}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                       <label>Section Name</label>
                                       <input type="text" name='pagesectionname' class="form-control" required>
                                       <span class="text-danger">@error('pagesectionname'){{$message}}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                       <label>Picture type</label>
                                       <select class="form-control" name="picturetype" required>
                                          <option value="image">Image</option>
                                          <option value="logo">Logo</option>
                                       </select>
                                    </div>
                                    <div class="form-group">
                                       <label>File</label>
                                       <input type="file" name="frontimage" class="form-control" required>
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
               <div id="viewpicModal" class="modal fade" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h4 class="modal-title">Pic Details</h4>
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                           <div class="container">
                              <div class="row">
                                 <div class="col-md-2 px-0"></div>
                                 <div class="col-xs-12 col-md-12 px-0">
                                    <label>Page Name</label>
                                    <input type="text" id="viewpagename" class="form-control" disabled>
                                    <label>Section Name</label>
                                    <input type="text" id="pagesectionname" class="form-control" disabled>
                                    <label>Picture type</label>
                                    <input type="text" id="picturetype" class="form-control" disabled>
                                 </div>
                              </div>
                          </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Edit Modal HTML -->
               <div id="editpicModal" class="modal fade">
                     <div class="modal-dialog">
                        <div class="modal-content">
                              <form method="post" action="/admin/sitesettings/updatepic" id="editform">
                                @csrf
                                 <div class="modal-header">
                                       <h4 class="modal-title">Edit Picture</h4>
                                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 </div>
                                 <div class="modal-body">
                                       <div class="form-group">
                                          <label>Page Name</label>
                                          <input type="text" id="viewpagenameedit" name="viewpagename" class="form-control" required>
                                       </div>
                                       <div class="form-group">
                                          <label>Section Name</label>
                                          <input type="text" id="pagesectionnameedit" name='pagesectionname' class="form-control" required>
                                       </div>
                                       <div class="form-group">
                                          <label>Picture type</label>
                                          <select class="form-control" id="picturetypeedit" name="picturetype" required>
                                             <option value="image">Image</option>
                                             <option value="logo">Logo</option>
                                          </select>
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
               <div id="deletepicModal" class="modal fade">
                     <div class="modal-dialog">
                        <div class="modal-content">
                              <form method="post" action="/admin/sitesettings/deletepic" id="deleteform">
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
                                       <input type="submit" class="btn btn-danger" value="Delete">
                                 </div>
                              </form>
                        </div>
                     </div>
                  </div>
            <!-- content -->
            {!! $pics->links() !!}
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
             'autoWidth'   : false,
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

                 $('#viewpagename').val(editdata[1]);
                 $('#pagesectionname').val(editdata[2]);
                 $('#picturetype').val(editdata[3]);
                 $('#image').val(editdata[4]);
             });
         });

         $(document).ready(function(){
             $(".edit").on('click',function(){
                 $tr = $(this).closest('tr');
                 var editdata = $tr.children('td').map(function(){
                     return $(this).text();
                 }).get();

                 $('#viewpagenameedit').val(editdata[1]);
                 $('#pagesectionnameedit').val(editdata[2]);
                 $('#picturetypeedit').val(editdata[3]);
                 $('#editform').attr('action','/admin/sitesettings/updatepic/'+editdata[0]);
             });
         });


         $(document).ready(function(){
             $('tbody').on('click', 'a', function(){
                 var value_id = $(this).closest('tr').find('td').first().text();
                 $('#deleteform').attr('action','/admin/sitesettings/deletepic/'+value_id);
             });
         });
     </script>
     <script>
        function onClick(element) {
            document.getElementById("img01").src = element.src;
            document.getElementById("modal01").style.display = "block";
        }
    </script>
   </body>
</html>

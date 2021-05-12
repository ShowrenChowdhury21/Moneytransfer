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
                  <li class=" active treeview">
                     <a href="#"> <i class="fa fa-support "></i> <span>Customer AID</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                     <ul class="treeview-menu">
                     <li><a href="/admin/sendmessage">Send Message</a></li>
                     <li class="active"> <a href="/admin/inbox">Inbox</a></li>
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
            <div class="content-header">
               <h1>Inbox</h1>
               <ol class="breadcrumb">
                  <li><a href="#">Customer AID</a></li>
                  <li><i class="fa fa-angle-right"></i> Inbox</li>
               </ol>
            </div>
            <!-- Main content -->
            <div class="content">
               <div class="info-box" style="margin-top: 30px;">
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
                   <h4 class="text-black">Inbox</h4>
                   <div class="table-responsive">
                      <table id="example1" class="table table-bordered table-striped">
                            <thead>
                             <tr>
                               <th style="min-width:45px;">Sender</th>
                               <th style="min-width: 400px;">Subject</th>
                               <th style="min-width: 400px;display:none;">Message</th>
                               <th>Attachments</th>
                               <th>Time</th>
                               <th >Actions</th>
                             </tr>
                            </thead>
                             <tbody>
                               @foreach($messages as $key => $message)
                               <tr>
                                  <td style="display:none;">{{$message->id}}</td>
                                  <td class="mailbox-name">{{$message->sender}}</td>
                                  <td class="mailbox-subject"><a href="#showmessageModal" class="view" data-toggle="modal">{{$message->subject}}</a></td>
                                  <td style="display:none;">{{$message->message}}</td>
                                  <td>
                                       @foreach ((explode(',', $message->files)) as $picture)
                                        @if (!$picture == null)
                                            <img src="{{ asset('uploads/MessageFiles/'.$picture) }}" class="modal-hover-opacity" id="imageresource"  onclick="onClick(this)" style="height:40px; width:60px;cursor:pointer" alt="no file">
                                        @endif
                                       @endforeach
                                  </td>
                                  <td class="mailbox-date">{{ $message->created_at->format('d M - h:i') }}</td>
                                  <td class="actions">
                                    <a href = "#replyModal" class="edit" data-toggle="modal"><i class="fa fa-reply" style="font-size: 25px;"></i></a>
                                     <a href="#deletemessageModal" class="delete" data-toggle="modal"><i class="fa fa-trash-o " aria-hidden="true" style="font-size: 25px;  padding-left: 20px;"></i></a>
                                  </td>
                               </tr>
                               @endforeach
                             </tbody>
                           </table>
                         </div>
                      </div>
                      {!! $messages->links() !!}
                      <!--Modal-->
                      <div id="modal01" class="modalimg" onclick="this.style.display='none'">
                        <span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <div class="modal-contentimg">
                          <img id="img01" style="max-width:100%">
                        </div>
                      </div>

                      <div id="showmessageModal" class="modal fade">
                        <div class="modal-dialog">
                           <div class="modal-content">
                             <div class="modal-header">
                              <h4 class="modal-title">Email Recieved</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                             </div>
                             <div class="modal-body">
                              <div class="form-group">
                                <label>From</label>
                                <input type="text" name = "from" id="from" class="form-control" disabled>
                               </div>
                               <div class="form-group">
                                 <label>Subject</label>
                                 <input type="text" name = "subject" id="subject" class="form-control" disabled>
                                </div>
                              <div class="form-group">
                               <label>Message Body</label>
                               <textarea name = "emailbody" class="form-control" id="emailbody"  rows="8" cols="50" disabled ></textarea>
                              </div>
                             <div class="modal-footer">
                              <input type="button" class="btn btn-default" data-dismiss="modal" value="Ok">
                             </div>
                           </div>
                          </div>
                        </div>
                      </div>

                      <div id="replyModal" class="modal fade">
                        <div class="modal-dialog">
                         <div class="modal-content">
                          <form action = "/admin/myinbox/reply" method = "post" id="editform" enctype="multipart/form-data">
                            @csrf
                           <div class="modal-header">
                            <h4 class="modal-title">Reply Email</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                           </div>
                           <div class="modal-body">
                            <div class="form-group">
                              <label>Reply To</label>
                              <input type="text" name = "to" id="to" class="form-control" >
                              <span class="text-danger">@error('to'){{$message}}@enderror</span>
                             </div>
                             <div class="form-group">
                              <label>Subject</label>
                              <input type="text" name = "subject" id="subjectreply" class="form-control" >
                              <span class="text-danger">@error('subject'){{$message}}@enderror</span>
                             </div>
                            <div class="form-group">
                             <label>Message Body</label>
                             <textarea name = "emailbody" class="form-control"  rows="8" cols="50" ></textarea>
                             <span class="text-danger">@error('emailbody'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group">
                              <label>Attachments</label>
                              <div class="controls">
                                <div class="entry input-group col-xs-12">
                                    <input type="file" name="attachments[]">
                                    <span class="input-group-btn">
                                        <button class="btn-primary btn-add" style="height: 30px; margin-left: 20px; width: 30px;" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                  </span>
                                </div>
                            </div>
                             </div>
                           </div>
                           <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-info" value="Reply">
                           </div>
                          </form>
                         </div>
                        </div>
                      </div>
                      <div id="deletemessageModal" class="modal fade">
                         <div class="modal-dialog">
                            <div class="modal-content">
                                  <form action = "/admin/myinbox/delete" method = "post" id="deleteform">
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
             'autoWidth'   : false,
           })
         })
       </script>
       <script>
            function onClick(element) {
                document.getElementById("img01").src = element.src;
                document.getElementById("modal01").style.display = "block";
            }
       </script>
       <script>
        $(document).ready(function(){
             $(".view").on('click',function(){
                 $tr = $(this).closest('tr');
                 var editdata = $tr.children('td').map(function(){
                     return $(this).text();
                 }).get();

                 $('#from').val(editdata[1]);
                 $('#subject').val(editdata[2]);
                 $('#emailbody').val(editdata[3]);
             });
         });

         $(document).ready(function(){
             $(".edit").on('click',function(){
                 $tr = $(this).closest('tr');
                 var editdata = $tr.children('td').map(function(){
                     return $(this).text();
                 }).get();

                 $('#to').val(editdata[1]);
                 $('#subjectreply').val(editdata[2]);
             });
         });


         $(document).ready(function(){
             $('tbody').on('click', 'a', function(){
                 var value_id = $(this).closest('tr').find('td').first().text();
                 $('#deleteform').attr('action','/admin/myinbox/delete/'+value_id);
             });
         });
     </script>
     <script>
        $(function()
          {
              $(document).on('click', '.btn-add', function(e)
              {
                  e.preventDefault();

                  var controlForm = $('.controls:first'),
                      currentEntry = $(this).parents('.entry:first'),
                      newEntry = $(currentEntry.clone()).appendTo(controlForm);

                  newEntry.find('input').val('');
                  controlForm.find('.entry:not(:last) .btn-add')
                      .removeClass('btn-add').addClass('btn-remove')
                      .removeClass('btn-success').addClass('btn-danger')
                      .html('<i class="fa fa-times" aria-hidden="true"></i>');
              }).on('click', '.btn-remove', function(e)
              {
              $(this).parents('.entry:first').remove();

                  e.preventDefault();
                  return false;
              });
          });
    </script>
   </body>
</html>

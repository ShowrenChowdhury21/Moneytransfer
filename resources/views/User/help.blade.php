<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MoneyTransfer - User</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styleuser.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/table.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables/css/dataTables.bootstrap.min.css') }}"/>
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
                                <li class="nav-item active"><a class="nav-link" href="/user/help"><i class="fas fa-hands-helping"></i> Help</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/verification"><i class="fas fa-cog"></i>Verification</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Pages List End -->
                </aside>
                <!-- Left Panel End -->

                <!-- Middle Panel  -->
                <div class="col-lg-9">
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
                    <h3 class="text-5 font-weight-700 d-flex admin-heading">Send Message</h3>
                      <section class="section bg-white" style="padding: 0;">
                        <div class="container">
                          <p class="text-4 mb-5">Share your problem, we will provide solution.</p>
                          <div class="row">
                            <div class="col-md-12">
                                <form class="form-submit" method="post" action="/user/help/sendmessage" enctype="multipart/form-data">
                                    @csrf
                                      <div class="form-group">
                                        <input class="form-control" name="subject" placeholder="Subject:">
                                        <span class="text-danger">@error('subject'){{$message}}@enderror</span>
                                      </div>
                                      <div class="form-group">
                                        <textarea id="compose-textarea" name="messagebody" class="form-control" style="height: 300px"></textarea>
                                        <span class="text-danger">@error('messagebody'){{$message}}@enderror</span>
                                      </div>
                                      <h6><i class="fa fa-paperclip"></i> Attachment</h6>
                                      <div class="controls">
                                          <div class="entry input-group col-xs-12">
                                              <input name="attachments[]" type="file">
                                              <span class="input-group-btn">
                                              <button class="btn-primary btn-add" style="height: 30px; margin-left: 20px; width: 20px;" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                            </span>
                                          </div>
                                      </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer m-b-2">
                                      <div class="pull-right col-xs-12 text-center">
                                        <button type="submit" class="btn btn-primary" style="margin-top: 80px; margin-bottom: 80px" ><i class="fa fa-envelope-o"></i> Send</button>
                                      </div>
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div>
                      </section>
                      <section class="section py-4 my-4 py-sm-5 my-sm-5">
                        <div class="container">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="info-box" style="margin-top: 30px;">
                                <h4 class="text-black">Inbox</h4>
                                <div class="table-responsive">
                                   <table id="example1" class="table table-bordered table-striped">
                                         <thead>
                                          <tr>
                                            <th style="min-width: 400px;">Subject</th>
                                            <th >Attachments</th>
                                            <th>Time</th>
                                            <th >Actions</th>
                                          </tr>
                                         </thead>
                                         <tbody>
                                            @foreach($messages as $key => $message)
                                            <tr>
                                               <td style="display:none;">{{$message->id}}</td>
                                               <td class="mailbox-subject"><a href="#showmessageModal" class="view" data-toggle="modal">{{$message->subject}}</a></td>
                                               <td style="display:none;">{{$message->message}}</td>
                                               <td>
                                                    @foreach ((explode(',', $message->files)) as $picture)
                                                        @if (!$picture == null)
                                                            <img src="{{ asset('uploads/MessageFiles/'.$picture) }}" class="modal-hover-opacity" class="modal-hover-opacity" id="imageresource"  onclick="onClick(this)" style="height:40px; width:60px;cursor:pointer" alt="no file">
                                                        @endif
                                                    @endforeach
                                               </td>
                                               <td class="mailbox-date">{{ $message->created_at->format('d M - h:i') }}</td>
                                               <td class="actions">
                                                 <a href = "#replyModal" class="edit" data-toggle="modal"><i class="fa fa-reply" style="font-size: 25px;  padding-left: 15px;"></i></a>
                                                 <a href="#deletemessageModal" class="delete" data-toggle="modal"><i class="fa fa-trash "  style="font-size: 25px;  padding-left: 10px;"></i></a>
                                               </td>
                                            </tr>
                                            @endforeach
                                          </tbody>
                                        </table>
                                      </div>
                                   </div>
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
                                            <input type="text" id="from" value="Admin" class="form-control" disabled>
                                           </div>
                                           <div class="form-group">
                                             <label>Subject</label>
                                             <input type="text" name = "subject" id="subject" class="form-control" disabled>
                                            </div>
                                          <div class="form-group">
                                           <label>Message Body</label>
                                           <textarea name = "messagebody" class="form-control" id="messagebody"  rows="8" cols="50" disabled ></textarea>
                                          </div>
                                         </div>
                                         <div class="modal-footer">
                                          <input type="button" class="btn btn-default" data-dismiss="modal" value="Ok">
                                         </div>
                                       </div>
                                      </div>
                                  </div>

                                  <div id="replyModal" class="modal fade">
                                    <div class="modal-dialog">
                                     <div class="modal-content">
                                      <form action = "/user/help/myinbox/reply" method = "post" id="editform" enctype="multipart/form-data">
                                        @csrf
                                       <div class="modal-header">
                                        <h4 class="modal-title">Reply Email</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                       </div>
                                       <div class="modal-body">
                                         <div class="form-group">
                                          <label>Subject</label>
                                          <input type="text" name = "subject" id="subjectreply" class="form-control" >
                                          <span class="text-danger">@error('subject'){{$message}}@enderror</span>
                                         </div>
                                        <div class="form-group">
                                         <label>Message Body</label>
                                         <textarea name = "messagebody" class="form-control"  rows="8" cols="50" ></textarea>
                                         <span class="text-danger">@error('messagebody'){{$message}}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                          <label>Attachments</label>
                                          <div class="controls">
                                            <div class="entry input-group col-xs-12">
                                                <input name="attachments[]" type="file">
                                              <span class="input-group-btn">
                                              <button class="btn-primary btn-add" style="height: 30px; margin-left: 20px; width: 20px;" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                              </span>
                                            </div>
                                        </div>
                                         </div>
                                       </div>
                                       <div class="modal-footer">
                                        <input type="submit" class="btn btn-success" value="Reply">
                                       </div>
                                      </form>
                                     </div>
                                    </div>
                                   </div>
                                  <div id="deletemessageModal" class="modal fade">
                                     <div class="modal-dialog">
                                        <div class="modal-content">
                                              <form action = "/user/help/myinbox/delete" method = "post" id="deleteform">
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
                                </div>
                            </div>
                        </div>
                    </section>
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
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
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

             $('#subject').val(editdata[1]);
             $('#messagebody').val(editdata[2]);
         });
     });

     $(document).ready(function(){
         $(".edit").on('click',function(){
             $tr = $(this).closest('tr');
             var editdata = $tr.children('td').map(function(){
                 return $(this).text();
             }).get();

             $('#subjectreply').val(editdata[1]);
         });
     });


     $(document).ready(function(){
         $('tbody').on('click', 'a', function(){
             var value_id = $(this).closest('tr').find('td').first().text();
             $('#deleteform').attr('action','/user/help/myinbox/delete/'+value_id);
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
</html>

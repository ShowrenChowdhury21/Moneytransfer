<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MoneyTransfer - User</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styleuser.css') }}"/>
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
                                <li class="nav-item active"><a class="nav-link" href="/user/cardandbank"><i class="fa fa-university"></i> Cards & Bank Accounts</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/help"><i class="fas fa-hands-helping"></i> Help</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/verification"><i class="fas fa-cog"></i>Verification</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Pages List End -->
                </aside>
                <!-- Left Panel End -->

                <!-- Middle Panel  -->
                <div class="col-lg-9">
                    <h2 class="font-weight-400 admin-heading">Profile Bank account</h2>
                    <!-- Bank Accounts -->
                    <div class="bg-light shadow-sm rounded p-4 mb-4">
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
                        <h3 class="text-5 font-weight-400 mb-4">Bank Accounts <span class="text-muted text-4">(for withdrawal)<p class="bg-light text-0 text-body font-weight-500 rounded-pill d-inline-block px-2 line-height-4 opacity-8 mb-0">Max 2</p></span>
                        </h3>
                        <div class="row">
                            @foreach($banks as $key => $bank)
                            <div class="col-12 col-sm-4">
                                <div class="account-card account-card-primary text-white rounded mb-4 mb-lg-0">
                                    <div class="row no-gutters">
                                        <div class="col-3 d-flex justify-content-center p-3">
                                            <div class="my-auto text-center text-13"><i class="fas fa-university"></i>
                                                <p class="bg-light text-0 text-body font-weight-500 rounded-pill d-inline-block px-2 line-height-4 opacity-8 mb-0"></p>
                                            </div>
                                        </div>
                                        <div class="col-9 border-left">
                                            <div class="py-4 my-2 pl-4">
                                                <p class="text-4 font-weight-500 mb-1">{{$bank->bankname}}</p>
                                                <p class="text-4 opacity-9 mb-1" id="accountnofordel">{{$bank->accountno}}</p>
                                                <p class="m-0">{{$bank->accounttype}} <span class="text-3"><i class="fas fa-check-circle"></i></span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="account-card-overlay rounded" id="deletebankdiv">
                                            <a href="#deletebankModal" data-toggle="modal" class="text-light btn-link mx-2" id="deletebankaccount"><span class="mr-1"><i class="fas fa-minus-circle"></i></span>Delete</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-12 col-sm-4"><a href="" data-target="#add-new-bank-account" data-toggle="modal" class="account-card-new d-flex align-items-center rounded h-100 p-3 mb-4 mb-lg-0">
                                <p class="w-100 text-center line-height-4 m-0"><span class="text-3"><i class="fas fa-plus-circle"></i></span> <span class="d-block text-body text-3">Add New Bank Account</span>
                                </p>
                            </a>
                            </div>
                        </div>
                    </div>
                    <!-- Add New Bank Account Details Modal  -->
                    <div id="add-new-bank-account" class="modal fade" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-400">Add bank account</h5>
                                    <button type="button" class="close font-weight-400" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body p-4">
                                    <form id="addbankaccount" method="post" action="/user/cardandbank/addbank">
                                        @csrf
                                        <div class="mb-3">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input id="personal" name="accounttype" class="custom-control-input" checked required value="personal" type="radio">
                                                <label class="custom-control-label" for="personal">Personal</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input id="business" name="accounttype" class="custom-control-input" required value="business" type="radio">
                                                <label class="custom-control-label" for="business">Business</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="bankName">Bank Name</label>
                                            <input type="text" class="form-control" name="bankname" id="bankName" required  placeholder="Enter Bank name...">
                                        </div>
                                        <div class="form-group">
                                            <label for="accountName">Account Name</label>
                                            <input type="text" class="form-control" name="accountname" id="accountName" required  placeholder="Enter account holder name...">
                                        </div>
                                        <div class="form-group">
                                            <label for="accountNumber">Account Number</label>
                                            <input type="text" class="form-control" name="accountno" id="accountNumber" required placeholder="e.g. 12346678900001">
                                        </div>
                                        <div class="form-group">
                                            <label for="ifscCode">NEFT IFSC Code</label>
                                            <input type="text" class="form-control" name="ifscCode" id="ifscCode" required placeholder="e.g. ABCDE12345">
                                        </div>
                                        <div class="form-check custom-control custom-checkbox mb-3">
                                            <input id="remember-me" name="remember" class="custom-control-input" type="checkbox" required>
                                            <label class="custom-control-label" for="remember-me">I confirm the bank
                                                account details above</label>
                                        </div>
                                        <button class="btn btn-primary btn-block my-4" style="font-size: 20px;" type="submit" id="submit">Add Bank account</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Bank Accounts End -->
                    <div id="deletebankModal" class="modal fade">
                        <div class="modal-dialog">
                           <div class="modal-content">
                            <form id="deleteform" method="post" action="/user/cardandbank/deletebank">
                                @csrf
                                 <div class="modal-header">
                                    <h4 class="modal-title">Delete Bank Details</h4>
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
                <!-- Middle Panel End -->

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
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#deletebankdiv').on('click', '#deletebankaccount', function(){
            var value_id = $('#accountnofordel').text();
            $('#deleteform').attr('action','/user/cardandbank/deletebank/'+value_id);
        });
    });
</script>
</body>
</html>

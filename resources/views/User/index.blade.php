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
                                <li class="nav-item active"><a class="nav-link " href="/user/dashboard"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/transactions"><i class="fa fa-list-ul"></i> Transactions</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/deposit"><i class="fa fa-plus"></i> Deposit Money</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/sendmoney"><i class="far fa-paper-plane"></i> Send Money</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/withdraw"><i class="fa fa-wallet"></i> Withdraw Money</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/profile"><i class="fa fa-user"></i> Account</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/cardandbank"><i class="fa fa-university"></i> Cards & Bank Accounts</a></li>
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
                    <div class="row">
                        <div class="col-lg-12">
                            @if (Session::get('warning'))
                            <div class="alert alert-warning">
                                {{Session::get('warning')}}
                            </div>
                            @endif
                            <!-- Available Balance -->
                            <div class="bg-light shadow-sm text-center mb-3">
                                <div class="d-flex admin-heading pr-3">
                                    <span class="mr-auto"><h3 class="text-6 font-weight-400"><i class="fas fa-wallet"></i> Available Balance</h3></span>
                                    <span class="ml-auto"><h3 class="text-6 font-weight-400">{{Session::get('currency')}} : {{number_format(Session::get('balance'),2)}}</h3></span>
                                </div>
                                <div class="pb-3 pl-3 pr-3 pt-0">
                                    <hr class="mx-n3 mt-0">
                                    <div class="d-flex">
                                        <a href="/user/sendmoney" class="btn-link mr-auto">Send</a>
                                        <a href="/user/withdraw" class="btn-link ml-auto">Withdraw</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Available Balance End -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
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
                            <a class="btn btn-primary btn-lg btn-block text-center" href="#reqcardModal" role="button" data-toggle="modal">Request Card</a>
                        </div>
                    </div><br>
                    <div id="reqcardModal" class="modal fade" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title font-weight-400">Request Card</h5>
                              <button type="button" class="close font-weight-400" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            <div class="modal-body p-4">
                                <form method="post" action="/user/dashboard/requestcard">
                                @csrf
                                <div class="form-group">
                                  <label for="edircardNumber">Your address</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend"> </div>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Address....." required>
                                  </div>
                                </div>
                                <button class="btn btn-primary" type="submit"> Request Card </button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    <!-- Recent Activity  -->
                    <div class="bg-light shadow-sm rounded profile-content">
                        <h3 class="text-5 font-weight-700 d-flex admin-heading">Recent Activity</h3>
                        <!-- Title  -->
                        <div class="transaction-title py-2 px-4">
                            <div class="row">
                                <div class="col-2 col-sm-1 text-center"><span class="">Date</span></div>
                                <div class="col col-sm-3">Transaction ID</div>
                                <div class="col col-sm-3">Description</div>
                                <div class="col-auto col-sm-2 d-none d-sm-block text-center">Status</div>
                                <div class="col-3 col-sm-2 text-right">Amount</div>
                            </div>
                        </div>
                        <!-- Title End -->

                        <!-- Transaction List -->
                        <div class="transaction-list">
                            @foreach($transactions as $key => $transaction)
                                <div class="transaction-item px-4 py-3">
                                    <div class="row align-items-center flex-row">
                                        <div class="col-2 col-sm-1 text-center pay-date">
                                            <span class="text-4 font-weight-300">{{$transaction->created_at->format('d')}}</span>
                                            <span class="text-1 font-weight-300 text-uppercase pay-month">{{$transaction->created_at->format('M')}}</span>
                                        </div>
                                        <div class="col col-sm-3">
                                            <span class="text-muted">{{$transaction->id}}</span>
                                        </div>
                                        <div class="col col-sm-3">
                                            @if (($transaction->sendtype) == 'withdraw')
                                                <span class="text-2">{{$transaction->bankname}}</span><br>
                                                <span class="text-muted">Withdraw</span>
                                            @elseif (($transaction->sendtype) == 'deposit')
                                                <span class="text-2">Deposit</span>
                                            @elseif ((($transaction->reciever) == Session::get('email')) && (($transaction->sendtype) == 'Send Money'))
                                                <span class="text-2">{{$transaction->sender}}</span><br>
                                                <span class="text-muted">Recieved Money</span>
                                            @elseif ((($transaction->sender) == Session::get('email')) && (($transaction->sendtype) == 'Send Money'))
                                                <span class="text-2">{{$transaction->reciever}}</span><br>
                                                <span class="text-muted">Send Money</span>
                                            @endif
                                        </div>
                                        <div class="col-auto col-sm-2 d-none d-sm-block text-center text-3">
                                            @if (($transaction->state) == 'pending')
                                                <span class="text-warning" data-toggle="tooltip" data-original-title="pending">Pending</span>
                                            @elseif (($transaction->state) == 'declined')
                                                <span class="text-danger" data-toggle="tooltip" data-original-title="declined">Declined</span>
                                            @else
                                                <span class="text-success" data-toggle="tooltip" data-original-title="accepted">Accepted</span>
                                            @endif

                                        </div>
                                        <div class="col-3 col-sm-2 text-right text-4">
                                            @if (($transaction->sendtype) == 'withdraw')
                                                <span class="text-nowrap">{{$transaction->amountsend}}</span>
                                                <span class="text-2 text-uppercase">({{$transaction->sendercurrency}})</span>
                                            @elseif (($transaction->sendtype) == 'deposit')
                                                <span class="text-nowrap">{{$transaction->amountsend}}</span>
                                                <span class="text-2 text-uppercase">({{$transaction->sendercurrency}})</span>
                                            @elseif ((($transaction->sender) == Session::get('email')) && (($transaction->sendtype) == 'Send Money'))
                                                <span class="text-nowrap">{{$transaction->amountsend}}</span>
                                                <span class="text-2 text-uppercase">({{$transaction->sendercurrency}})</span>
                                            @elseif ((($transaction->reciever) == Session::get('email')) && (($transaction->sendtype) == 'Send Money'))
                                                <span class="text-nowrap">{{$transaction->amountrecieved}}</span>
                                                <span class="text-2 text-uppercase">({{$transaction->recievercurrency}})</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        <!-- Transaction List End -->
                        <!-- View all Link -->
                        <div class="text-center mt-3 py-4"><a href="/user/transactions" class="btn-link text-3">View all<i class="fas fa-chevron-right text-2 ml-2"></i></a> <br></div>
                        <!-- View all Link End -->
                    </div>
                    <!-- Recent Activity End -->
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
</body>
</html>

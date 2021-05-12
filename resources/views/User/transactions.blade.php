<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MoneyTransfer - User</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styleuser.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}"/>
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
                                <li class="nav-item active"><a class="nav-link" href="/user/transactions"><i class="fa fa-list-ul"></i> Transactions</a></li>
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

                <!-- Container Panel  -->
                <div class="col-lg-9">
                    <h2 class="font-weight-400 mb-3 admin-heading">All Transactions</h2>
                    <!-- Filter -->
                    <div class="row">
                        <div class="col mb-2">
                            <form id="filterTransactions" method="post">
                                <div class="form-row">
                                    <!-- Date Range -->
                                    <div class="col-sm-10 col-md-12 form-group">
                                        <input id="dateRange" type="text" class="form-control" placeholder="Date Range">
                                        <span class="icon-inside"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <div id="results"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Filter End -->

                    <!-- All Transactions  -->
                    <div class="bg-light shadow-sm rounded mb-4">

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
                    </div>
                    <!-- All Transactions End -->
                </div>
                <!-- Middle End -->
                {!! $transactions->links() !!}
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

    $('#dateRange').on('change', function(){
        var val = document.getElementById("dateRange").value;
        var array1 = val.split(" - ");

        var from = array1[0];
        var to = array1[1];

        var date1 = new Date(from);
        var date2 = new Date(to);
        var fromdate = date1.getFullYear() + '/' + (date1.getMonth()+1) + '/' +  date1.getDate();
        var todate = date2.getFullYear() + '/' + (date2.getMonth()+1) + '/' +  date2.getDate();
        console.log(fromdate);
        console.log(todate);
        $.ajax({
            type: 'GET',
            dataType: 'JSON',
            url: '{{route("user.searchtransactions")}}',
            data: {
                'fromdate': fromdate,
                'todate'  : todate
                  },
            success: function(data) {
                $('#results').html(data);
            }
        });
    });
</script>
</body>
</html>

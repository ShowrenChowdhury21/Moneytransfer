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
                                <li class="nav-item active"><a class="nav-link" href="/user/deposit"><i class="fa fa-plus"></i> Deposit Money</a></li>
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

                <div class="col-lg-9">
                    <div class="bg-white">
                        <div class="container d-flex justify-content-center primary-menu ml-auto">
                            <ul class="nav pro-sec-menu secondary-nav alternate">
                                <li class="has-menu-child nav-item active">
                                    <a class="nav-link" href="/user/deposit">Deposit</a>
                                </li>
                                <li class="has-menu-child nav-item">
                                    <a class="nav-link" href="/user/sendmoney">Send</a>
                                </li>
                                <li class="has-menu-child nav-item">
                                    <a class="nav-link" href="/user/withdraw">Withdraw</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <h3 class="text-5 font-weight-700 d-flex admin-heading">Deposit Money</h3>
                    <div class="bg-white">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 mx-auto ">
                                <div class="bg-light shadow-md rounded p-3 p-sm-4 mb-8 mt-8 form-box">
                                    <!-- Deposit Money Form  -->
                                    <div class="row">
                                        <div class="col-md-4" >
                                            <a href="#paypaldepositamount" data-toggle="modal"><img src="{{ asset('assets/img/client/paypal.png') }}" alt="paypal" style="padding: 30px;" ></a>
                                        </div>
                                        <div class="col-md-4" >
                                            <a href="#stripdepositamount"  data-toggle="modal"><img src="{{ asset('assets/img/client/visa.png') }}" alt="visa" style="padding: 30px;" ></a>
                                        </div>
                                        <div class="col-md-4" >
                                            <a href="#stripdepositamount"  data-toggle="modal"><img src="{{ asset('assets/img/client/mastercard.png') }}" alt="mastercard" style="padding: 30px;"></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4" >
                                            <a href="#stripdepositamount"  data-toggle="modal"><img src="{{ asset('assets/img/client/discover.png') }}" alt="discover" style="padding: 30px;"></a>
                                        </div>
                                        <div class="col-md-4" >
                                            <a href="#stripdepositamount"  data-toggle="modal"><img src="{{ asset('assets/img/client/jcb.png') }}" alt="jcb" style="padding: 30px;" ></a>
                                        </div>
                                        <div class="col-md-4" >
                                            <a href="#stripdepositamount"  data-toggle="modal"><img src="{{ asset('assets/img/client/americanexpress.png') }}" alt="americanexpress" style="padding: 30px;"></a>
                                        </div>
                                    </div>
                                    <!-- Deposit Money Form end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="paypaldepositamount" class="modal fade">
        <div class="modal-dialog">
           <div class="modal-content">
                 <div class="modal-header">
                    <h4 class="modal-title">PayPal Deposit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 </div>
                 <div class="modal-body">
                    <div class="form-group">
                       <label>Deposit Amount($)</label>
                       <input type="text" name="depositamount" id="depositamount" class="form-control" required>
                       <span class="text-danger">@error('depositamount'){{$message}}@enderror</span>
                    </div>
                 </div>
                 <div class="modal-footer">
                    <div id="paypal-button"></div>
                 </div>
           </div>
        </div>
     </div>

     <div id="stripdepositamount" class="modal fade">
        <div class="modal-dialog">
           <div class="modal-content">
              <form role="form" action="/user/deposit/stripedeposit" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                 <div class="modal-header">
                    <h4 class="modal-title">PayPal Deposit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 </div>
                 <div class="modal-body">
                    @if (Session::has('success'))
                     <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p><br>
                     </div>
                     @endif
                     <br>
                        @csrf
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-12 form-group required'>
                                <label class='control-label'>Amount for deposit($)</label>
                                <input class='form-control' size='4' type='text' name="striedepositamount">
                            </div>
                           <div class='col-xs-12 col-md-6 form-group required'>
                              <label class='control-label'>Name on Card</label>
                              <input class='form-control' size='4' type='text'>
                           </div>
                           <div class='col-xs-12 col-md-6 form-group required'>
                              <label class='control-label'>Card Number</label>
                              <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                           </div>
                        </div>
                        <div class='form-row row'>
                           <div class='col-xs-12 col-md-4 form-group cvc required'>
                              <label class='control-label'>CVC</label>
                              <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                           </div>
                           <div class='col-xs-12 col-md-4 form-group expiration required'>
                              <label class='control-label'>Expiration Month</label>
                              <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                           </div>
                           <div class='col-xs-12 col-md-4 form-group expiration required'>
                              <label class='control-label'>Expiration Year</label>
                              <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                           </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                    </div>
                </div>
            </form>
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
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="{{ asset('assets/plugins/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script>
    paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'AbO70VVsNf5tKlN5fjUtPCEYLoCzuCl5ehALMp11TqkBhLLY6Lw_ZH19lWsArYm9LEZXghrvsQh0rrsw',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'large',
      color: 'blue',
      shape: 'pill',
      size: 'responsive'
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      var num = document.getElementById("depositamount").value;
      return actions.payment.create({
        transactions: [{
          amount: {
            total: num.toString(),
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
        var num = document.getElementById("depositamount").value;
        return actions.payment.execute().then(function() {
            $.ajax({
                type: 'GET',
                dataType: 'JSON',
                url: '{{route("user.depositpaypal")}}',
                data: {
                    'amount': num
                },
                success: function(data) {
                    console.log(data.success);
                }
            });

        // Show a confirmation message to the buyer
        window.alert('Thank you. Amount Deposited Successfully!');
      });
    }
  }, '#paypal-button');
</script>
<script type="text/javascript">
    $(function() {
      var $form = $(".require-validation");
      $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
        $errorMessage.addClass('hide');
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
            }
        });
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
              number: $('.card-number').val(),
              cvc: $('.card-cvc').val(),
              exp_month: $('.card-expiry-month').val(),
              exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
      });

      function stripeResponseHandler(status, response) {
          if (response.error) {
              $('.error')
                  .removeClass('hide')
                  .find('.alert')
                  .text(response.error.message);
          } else {
              /* token contains id, last4, and card type */
              var token = response['id'];
              $form.find('input[type=text]').empty();
              $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
              $form.get(0).submit();
          }
      }
    });
</script>
</body>
</html>

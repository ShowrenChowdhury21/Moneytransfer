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
                                <li class="nav-item active"><a class="nav-link" href="/user/profile"><i class="fa fa-user"></i> Account</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/cardandbank"><i class="fa fa-university"></i> Cards & Bank Accounts</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/help"><i class="fas fa-hands-helping"></i> Help</a></li>
                                <li class="nav-item"><a class="nav-link" href="/user/verification"><i class="fas fa-cog"></i>Verification</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Pages List End -->
                </aside>
                <!-- Left Panel End -->

                <!-- Middle Panel -->
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
                    <h3 class="text-5 font-weight-700 d-flex admin-heading">Personal Profile</h3>
                    <!-- Personal Details  -->
                    <div class="bg-light shadow-sm rounded infoItems">
                        <a href="#edit-personal-details" class="float-right text-1 text-uppercase text-muted btn-link pbtn" data-id="edit-personal-details"><i class="fas fa-edit mr-1"></i>Update</a>
                        <div class="row">
                            <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                            <p class="col-sm-9">{{Session::get('name')}}</p>
                        </div>
                        <div class="row">
                            <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Country</p>
                            <p class="col-sm-9">{{Session::get('country')}}</p>
                        </div>

                        <div id="edit-personal-details" class="accord">
                            <div>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title font-weight-400">Personal Details</h5>
                                        <button type="button" class="close font-weight-400" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <form id="personaldetails" method="post" action="/user/profile/personaldetails">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="Name">Name</label>
                                                        <input type="text" value="{{Session::get('name')}}" class="form-control" name="name" id="firstName" required placeholder="Name...">
                                                        <span class="text-danger">@error('name'){{$message}}@enderror</span>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="country">Country</label>
                                                        <div class="input">
                                                            <select id="select2" name="country" class="form-control" style="height: 52px;">
                                                                <option selected value="{{Session::get('country')}}">{{Session::get('country')}}</option>
                                                                <option value="Afghanistan">Afghanistan</option>
                                                                <option value="Åland Islands">Åland Islands</option>
                                                                <option value="Albania">Albania</option>
                                                                <option value="Algeria">Algeria</option>
                                                                <option value="American Samoa">American Samoa</option>
                                                                <option value="Andorra">Andorra</option>
                                                                <option value="Angola">Angola</option>
                                                                <option value="Anguilla">Anguilla</option>
                                                                <option value="Antarctica">Antarctica</option>
                                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                                <option value="Argentina">Argentina</option>
                                                                <option value="Armenia">Armenia</option>
                                                                <option value="Aruba">Aruba</option>
                                                                <option value="Australia">Australia</option>
                                                                <option value="Austria">Austria</option>
                                                                <option value="Azerbaijan">Azerbaijan</option>
                                                                <option value="Bahamas">Bahamas</option>
                                                                <option value="Bahrain">Bahrain</option>
                                                                <option value="Bangladesh">Bangladesh</option>
                                                                <option value="Barbados">Barbados</option>
                                                                <option value="Belarus">Belarus</option>
                                                                <option value="Belgium">Belgium</option>
                                                                <option value="Belize">Belize</option>
                                                                <option value="Benin">Benin</option>
                                                                <option value="Bermuda">Bermuda</option>
                                                                <option value="Bhutan">Bhutan</option>
                                                                <option value="Bolivia">Bolivia</option>
                                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                                <option value="Botswana">Botswana</option>
                                                                <option value="Bouvet Island">Bouvet Island</option>
                                                                <option value="Brazil">Brazil</option>
                                                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                                <option value="Bulgaria">Bulgaria</option>
                                                                <option value="Burkina Faso">Burkina Faso</option>
                                                                <option value="Burundi">Burundi</option>
                                                                <option value="Cambodia">Cambodia</option>
                                                                <option value="Cameroon">Cameroon</option>
                                                                <option value="Canada">Canada</option>
                                                                <option value="Cape Verde">Cape Verde</option>
                                                                <option value="Cayman Islands">Cayman Islands</option>
                                                                <option value="Central African Republic">Central African Republic</option>
                                                                <option value="Chad">Chad</option>
                                                                <option value="Chile">Chile</option>
                                                                <option value="China">China</option>
                                                                <option value="Christmas Island">Christmas Island</option>
                                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                                <option value="Colombia">Colombia</option>
                                                                <option value="Comoros">Comoros</option>
                                                                <option value="Congo">Congo</option>
                                                                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                                <option value="Cook Islands">Cook Islands</option>
                                                                <option value="Costa Rica">Costa Rica</option>
                                                                <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                                <option value="Croatia">Croatia</option>
                                                                <option value="Cuba">Cuba</option>
                                                                <option value="Cyprus">Cyprus</option>
                                                                <option value="Czech Republic">Czech Republic</option>
                                                                <option value="Denmark">Denmark</option>
                                                                <option value="Djibouti">Djibouti</option>
                                                                <option value="Dominica">Dominica</option>
                                                                <option value="Dominican Republic">Dominican Republic</option>
                                                                <option value="Ecuador">Ecuador</option>
                                                                <option value="Egypt">Egypt</option>
                                                                <option value="El Salvador">El Salvador</option>
                                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                <option value="Eritrea">Eritrea</option>
                                                                <option value="Estonia">Estonia</option>
                                                                <option value="Ethiopia">Ethiopia</option>
                                                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                                <option value="Faroe Islands">Faroe Islands</option>
                                                                <option value="Fiji">Fiji</option>
                                                                <option value="Finland">Finland</option>
                                                                <option value="France">France</option>
                                                                <option value="French Guiana">French Guiana</option>
                                                                <option value="French Polynesia">French Polynesia</option>
                                                                <option value="French Southern Territories">French Southern Territories</option>
                                                                <option value="Gabon">Gabon</option>
                                                                <option value="Gambia">Gambia</option>
                                                                <option value="Georgia">Georgia</option>
                                                                <option value="Germany">Germany</option>
                                                                <option value="Ghana">Ghana</option>
                                                                <option value="Gibraltar">Gibraltar</option>
                                                                <option value="Greece">Greece</option>
                                                                <option value="Greenland">Greenland</option>
                                                                <option value="Grenada">Grenada</option>
                                                                <option value="Guadeloupe">Guadeloupe</option>
                                                                <option value="Guam">Guam</option>
                                                                <option value="Guatemala">Guatemala</option>
                                                                <option value="Guernsey">Guernsey</option>
                                                                <option value="Guinea">Guinea</option>
                                                                <option value="Guinea-bissau">Guinea-bissau</option>
                                                                <option value="Guyana">Guyana</option>
                                                                <option value="Haiti">Haiti</option>
                                                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                                <option value="Honduras">Honduras</option>
                                                                <option value="Hong Kong">Hong Kong</option>
                                                                <option value="Hungary">Hungary</option>
                                                                <option value="Iceland">Iceland</option>
                                                                <option value="India">India</option>
                                                                <option value="Indonesia">Indonesia</option>
                                                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                                <option value="Iraq">Iraq</option>
                                                                <option value="Ireland">Ireland</option>
                                                                <option value="Isle of Man">Isle of Man</option>
                                                                <option value="Israel">Israel</option>
                                                                <option value="Italy">Italy</option>
                                                                <option value="Jamaica">Jamaica</option>
                                                                <option value="Japan">Japan</option>
                                                                <option value="Jersey">Jersey</option>
                                                                <option value="Jordan">Jordan</option>
                                                                <option value="Kazakhstan">Kazakhstan</option>
                                                                <option value="Kenya">Kenya</option>
                                                                <option value="Kiribati">Kiribati</option>
                                                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                                <option value="Korea, Republic of">Korea, Republic of</option>
                                                                <option value="Kuwait">Kuwait</option>
                                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                                <option value="Latvia">Latvia</option>
                                                                <option value="Lebanon">Lebanon</option>
                                                                <option value="Lesotho">Lesotho</option>
                                                                <option value="Liberia">Liberia</option>
                                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                                <option value="Liechtenstein">Liechtenstein</option>
                                                                <option value="Lithuania">Lithuania</option>
                                                                <option value="Luxembourg">Luxembourg</option>
                                                                <option value="Macao">Macao</option>
                                                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                                <option value="Madagascar">Madagascar</option>
                                                                <option value="Malawi">Malawi</option>
                                                                <option value="Malaysia">Malaysia</option>
                                                                <option value="Maldives">Maldives</option>
                                                                <option value="Mali">Mali</option>
                                                                <option value="Malta">Malta</option>
                                                                <option value="Marshall Islands">Marshall Islands</option>
                                                                <option value="Martinique">Martinique</option>
                                                                <option value="Mauritania">Mauritania</option>
                                                                <option value="Mauritius">Mauritius</option>
                                                                <option value="Mayotte">Mayotte</option>
                                                                <option value="Mexico">Mexico</option>
                                                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                                <option value="Monaco">Monaco</option>
                                                                <option value="Mongolia">Mongolia</option>
                                                                <option value="Montenegro">Montenegro</option>
                                                                <option value="Montserrat">Montserrat</option>
                                                                <option value="Morocco">Morocco</option>
                                                                <option value="Mozambique">Mozambique</option>
                                                                <option value="Myanmar">Myanmar</option>
                                                                <option value="Namibia">Namibia</option>
                                                                <option value="Nauru">Nauru</option>
                                                                <option value="Nepal">Nepal</option>
                                                                <option value="Netherlands">Netherlands</option>
                                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                                <option value="New Caledonia">New Caledonia</option>
                                                                <option value="New Zealand">New Zealand</option>
                                                                <option value="Nicaragua">Nicaragua</option>
                                                                <option value="Niger">Niger</option>
                                                                <option value="Nigeria">Nigeria</option>
                                                                <option value="Niue">Niue</option>
                                                                <option value="Norfolk Island">Norfolk Island</option>
                                                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                                <option value="Norway">Norway</option>
                                                                <option value="Oman">Oman</option>
                                                                <option value="Pakistan">Pakistan</option>
                                                                <option value="Palau">Palau</option>
                                                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                                <option value="Panama">Panama</option>
                                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                                <option value="Paraguay">Paraguay</option>
                                                                <option value="Peru">Peru</option>
                                                                <option value="Philippines">Philippines</option>
                                                                <option value="Pitcairn">Pitcairn</option>
                                                                <option value="Poland">Poland</option>
                                                                <option value="Portugal">Portugal</option>
                                                                <option value="Puerto Rico">Puerto Rico</option>
                                                                <option value="Qatar">Qatar</option>
                                                                <option value="Reunion">Reunion</option>
                                                                <option value="Romania">Romania</option>
                                                                <option value="Russian Federation">Russian Federation</option>
                                                                <option value="Rwanda">Rwanda</option>
                                                                <option value="Saint Helena">Saint Helena</option>
                                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                                <option value="Saint Lucia">Saint Lucia</option>
                                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                                <option value="Samoa">Samoa</option>
                                                                <option value="San Marino">San Marino</option>
                                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                                <option value="Senegal">Senegal</option>
                                                                <option value="Serbia">Serbia</option>
                                                                <option value="Seychelles">Seychelles</option>
                                                                <option value="Sierra Leone">Sierra Leone</option>
                                                                <option value="Singapore">Singapore</option>
                                                                <option value="Slovakia">Slovakia</option>
                                                                <option value="Slovenia">Slovenia</option>
                                                                <option value="Solomon Islands">Solomon Islands</option>
                                                                <option value="Somalia">Somalia</option>
                                                                <option value="South Africa">South Africa</option>
                                                                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                                <option value="Spain">Spain</option>
                                                                <option value="Sri Lanka">Sri Lanka</option>
                                                                <option value="Sudan">Sudan</option>
                                                                <option value="Suriname">Suriname</option>
                                                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                                <option value="Swaziland">Swaziland</option>
                                                                <option value="Sweden">Sweden</option>
                                                                <option value="Switzerland">Switzerland</option>
                                                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                                <option value="Tajikistan">Tajikistan</option>
                                                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                                <option value="Thailand">Thailand</option>
                                                                <option value="Timor-leste">Timor-leste</option>
                                                                <option value="Togo">Togo</option>
                                                                <option value="Tokelau">Tokelau</option>
                                                                <option value="Tonga">Tonga</option>
                                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                                <option value="Tunisia">Tunisia</option>
                                                                <option value="Turkey">Turkey</option>
                                                                <option value="Turkmenistan">Turkmenistan</option>
                                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                                <option value="Tuvalu">Tuvalu</option>
                                                                <option value="Uganda">Uganda</option>
                                                                <option value="Ukraine">Ukraine</option>
                                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                                <option value="United Kingdom">United Kingdom</option>
                                                                <option value="United States">United States</option>
                                                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                                <option value="Uruguay">Uruguay</option>
                                                                <option value="Uzbekistan">Uzbekistan</option>
                                                                <option value="Vanuatu">Vanuatu</option>
                                                                <option value="Venezuela">Venezuela</option>
                                                                <option value="Viet Nam">Viet Nam</option>
                                                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                                <option value="Western Sahara">Western Sahara</option>
                                                                <option value="Yemen">Yemen</option>
                                                                <option value="Zambia">Zambia</option>
                                                                <option value="Zimbabwe">Zimbabwe</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-block mt-2" type="submit">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Edit Details Modal  -->

                    <!-- Personal Details End -->

                    <!-- Account Settings -->
                    <div class="bg-light shadow-sm rounded infoItems">
                        <a href="#edit-account-settings" class="float-right text-1 text-uppercase text-muted btn-link pbtn" data-id="edit-account-settings"><i class="fas fa-edit mr-1"></i>Update</a>
                        <div class="row">
                            <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Currency</p>
                            <p class="col-sm-9">{{Session::get('currency')}}</p>
                        </div>
                        <!-- Edit Details Modal  -->
                        <div id="edit-account-settings" class="accord">
                            <div class="">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title font-weight-400">Account Settings</h5>
                                        <button type="button" class="close font-weight-400" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <form id="accountSettings" method="post" action="/user/profile/currencysettings">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="Currency">Currency</label>
                                                        <div class="input">
                                                            <select class="form-control" style="height: 52px;" id="select1" name="currency" required>
                                                                <option data-subtext="" selected value="{{Session::get('currency')}}">{{Session::get('currency')}}</option>
                                                                <option data-subtext="United States dollar" value="USD">USD</option>
                                                                <option data-subtext="Australian dollar" value="AUD">AUD</option>
                                                                <option data-subtext="Indian rupee" value="INR">INR</option>
                                                                <option data-subtext="United Arab Emirates dirham" value="AED">AED</option>
                                                                <option data-subtext="Argentine peso" value="ARS">ARS</option>
                                                                <option data-subtext="Bangladeshi taka" value="BDT">BDT</option>
                                                                <option data-subtext="Bulgarian lev" value="BGN">BGN</option>
                                                                <option data-subtext="Brazilian real" value="BRL">BRL</option>
                                                                <option data-subtext="Canadian dollar" value="CAD">CAD</option>
                                                                <option data-subtext="Swiss franc" value="CHF">CHF</option>
                                                                <option data-subtext="Chilean peso" value="CLP">CLP</option>
                                                                <option data-subtext="Chinese yuan" value="CNY">CNY</option>
                                                                <option data-subtext="Czech koruna" value="CZK">CZK</option>
                                                                <option data-subtext="Danish krone" value="DKK">DKK</option>
                                                                <option data-subtext="Egyptian pound" value="EGP">EGP</option>
                                                                <option data-subtext="Euro" value="EUR">EUR</option>
                                                                <option data-subtext="British pound" value="GBP">GBP</option>
                                                                <option data-subtext="Georgian lari" value="GEL">GEL</option>
                                                                <option data-subtext="Ghanaian cedi" value="GHS">GHS</option>
                                                                <option data-subtext="Hong Kong dollar" value="HKD">HKD</option>
                                                                <option data-subtext="Croatian kuna" value="HRK">HRK</option>
                                                                <option  data-subtext="Hungarian forint" value="HUF">HUF</option>
                                                                <option  data-subtext="Indonesian rupiah" value="IDR">IDR</option>
                                                                <option  data-subtext="Israeli shekel" value="ILS">ILS</option>
                                                                <option  data-subtext="Indian rupee" value="INR">INR</option>
                                                                <option  data-subtext="Japanese yen" value="JPY">JPY</option>
                                                                <option  data-subtext="Kenyan shilling" value="KES">KES</option>
                                                                <option data-subtext="South Korean won" value="KRW">KRW</option>
                                                                <option  data-subtext="Sri Lankan rupee" value="LKR">LKR</option>
                                                                <option  data-subtext="Moroccan dirham" value="MAD">MAD</option>
                                                                <option data-subtext="Mexican peso" value="MXN">MXN</option>
                                                                <option  data-subtext="Malaysian ringgit" value="MYR">MYR</option>
                                                                <option  data-subtext="Nigerian naira" value="NGN">NGN</option>
                                                                <option  data-subtext="Norwegian krone" value="NOK">NOK</option>
                                                                <option  data-subtext="Nepalese rupee" value="NPR">NPR</option>
                                                                <option  data-subtext="New Zealand dollar" value="NZD">NZD</option>
                                                                <option  data-subtext="Peruvian nuevo sol" value="PEN">PEN</option>
                                                                <option  data-subtext="Philippine peso" value="PHP">PHP</option>
                                                                <option data-subtext="Pakistani rupee" value="PKR">PKR</option>
                                                                <option  data-subtext="Polish złoty" value="PLN">PLN</option>
                                                                <option  data-subtext="Romanian leu" value="RON">RON</option>
                                                                <option  data-subtext="Russian rouble" value="RUB">RUB</option>
                                                                <option data-subtext="Swedish krona" value="SEK">SEK</option>
                                                                <option  data-subtext="Singapore dollar" value="SGD">SGD</option>
                                                                <option  data-subtext="Thai baht" value="THB">THB</option>
                                                                <option data-subtext="Turkish lira" value="TRY">TRY</option>
                                                                <option  data-subtext="Ukrainian hryvnia" value="UAH">UAH</option>
                                                                <option data-subtext="Ugandan shilling" value="UGX">UGX</option>
                                                                <option data-subtext="Vietnamese dong" value="VND">VND</option>
                                                                <option data-subtext="South African rand" value="ZAR">ZAR</option>
                                                             </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-block mt-2" type="submit">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Account Settings End -->
                    </div>

                    <!-- Email Addresses  -->
                    <div class="bg-light shadow-sm rounded infoItems">
                        <a href="#edit-email" class="float-right text-1 text-uppercase text-muted btn-link pbtn" data-id="edit-email"><i class="fas fa-edit mr-1"></i>Update</a>
                        <div class="row">
                            <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Email ID <span class="text-muted font-weight-500">(Primary)</span></p>
                            <p class="col-sm-9">{{Session::get('email')}}</p>
                        </div>
                        <div id="edit-email" class="accord">
                            <div class="">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title font-weight-400">Email Addresses</h5>
                                        <button type="button" class="close font-weight-400" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <form id="emailAddresses" method="post" action="/user/profile/emailsettings">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="emailID">Email ID <span class="text-muted font-weight-500">(Primary)</span></label>
                                                        <input type="text" value="{{Session::get('email')}}" class="form-control" name="email" id="emailID" required placeholder="Email....">
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
                    </div>
                    <!-- Email Addresses End -->

                    <!-- Security -->
                    <div class="bg-light shadow-sm rounded infoItems">
                        <a href="#change-password" class="float-right text-1 text-uppercase text-muted btn-link pbtn" data-id="change-password"><i class="fas fa-edit mr-1"></i>Update</a>
                        <div class="row">
                            <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">
                                <label class="col-form-label">Password</label>
                            </p>
                            <p class="col-sm-9">
                                <input type="password" class="form-control-plaintext" data-bv-field="password" id="password" value="EnterPassword">
                            </p>
                        </div>
                        <div id="change-password" class="accord">
                            <div class="">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title font-weight-400">Change Password</h5>
                                        <button type="button" class="close font-weight-400" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>

                                    <div class="modal-body">
                                        <form id="changePassword" method="post" action="/user/profile/passwordsettings">
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
                                            <button class="btn btn-primary btn-block mt-4" type="submit">Update Security</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Security End -->
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

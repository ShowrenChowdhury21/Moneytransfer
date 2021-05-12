<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//login Route
Route::get('/login', [UserAuthController::class, 'login'])->name('auth.login')->middleware('alreadyloggedin');
//Signup route
Route::get('/signup', [UserAuthController::class, 'signup'])->middleware('alreadyloggedin');
//Forget Password route
Route::get('/forgetpassword', [UserAuthController::class, 'forgetpassword']);
//Login process route
Route::post('loginprocess', [UserAuthController::class, 'loginprocess'])->name('auth.loginprocess');
//Otp route
Route::get('otp/{email}', [UserAuthController::class, 'otp'])->name('auth.otp');
//Resend OTP route
Route::post('otp/{email}', [UserAuthController::class, 'resendotp'])->name('auth.resendotp');
//Otp verification route
Route::post('otp', [UserAuthController::class, 'otpverify'])->name('auth.otpverify');
//Signup process route
Route::post('signupprocess', [UserAuthController::class, 'signupprocess'])->name('auth.signupprocess');
//User verification route
Route::get('/verify', [UserAuthController::class, 'verifyuser'])->name('verify.user');
//Forget Password Process Route
Route::post('forgetpasswordprocess', [UserAuthController::class, 'forgetpasswordprocess'])->name('auth.forgetpasswordprocess');
//Password Reset Route
Route::get('resetpassword/{email}/{token}', [UserAuthController::class, 'getPassword'])->name('auth.resetpassword');
//Password Reset process route
Route::post('resetpassword', [UserAuthController::class, 'updatePassword'])->name('auth.resetpasswordprocess');

/*Home*/

//Home index(main) page route
Route::get('/', [HomeController::class, 'index'])->name('Home.index');
//Home index(main) page route
Route::get('/home', [HomeController::class, 'index'])->name('Home.index');
//Home Transaction(send/recieve) route
Route::get('/transaction', [HomeController::class, 'transaction'])->name('Home.transaction');
//Home About us route
Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('Home.aboutus');
//Home contact route
Route::get('/contact', [HomeController::class, 'contact'])->name('Home.contact');
//Home Fees route
Route::get('/fees', [HomeController::class, 'fees'])->name('Home.fees');
//Home help or user support route
Route::get('/help', [HomeController::class, 'help'])->name('Home.help');


//Session Check
Route::middleware(['session_check'])->group(function(){
    /*Admin*/
    //Admin Role check
    Route::middleware(['admin_check'])->group(function(){
        //Admin dashboard route
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index');

        //Admin User Management route
        Route::get('/admin/usermanagement', [AdminController::class, 'users'])->name('admin.usermanagement');
        //Admin Update user(User Management) route
        Route::post('/admin/usermanagement/updateuser/{id}', [AdminController::class, 'updateuser']);
        //Admin Delete user(User Management) route
        Route::post('/admin/usermanagement/deleteuser/{id}', [AdminController::class, 'deleteuser']);

        //Admin User Verification Route
        Route::get('/admin/userverification', [AdminController::class, 'userverification'])->name('admin.userverification');
        //Admin Update Status(User Verification) Route
        Route::get('/admin/userverification/updateuserverification', [AdminController::class, 'updateuserverification'])->name('admin.updateuserverification');

        //Admin User Card Request Route
        Route::get('/admin/cardrequests', [AdminController::class, 'cardrequests'])->name('admin.cardrequests');
        //Admin Update Status(User Card Request) Route
        Route::post('/admin/cardrequests/updatecardrequests/{cardno}', [AdminController::class, 'updatecardrequests'])->name('admin.updatecardrequests');

        //Admin account/profile route
        Route::get('/admin/myaccount', [AdminController::class, 'myaccount'])->name('admin.myaccount');
        //Admin personal details update route
        Route::post('/admin/myaccount/personaldatachange', [AdminController::class, 'personaldatachange'])->name('admin.personaldatachange');
        //Admin email update route
        Route::post('/admin/myaccount/emailchange', [AdminController::class, 'emailchange'])->name('admin.emailchange');
        //Admin password change route
        Route::post('/admin/myaccount/passwordchange', [AdminController::class, 'passwordchange'])->name('admin.passwordchange');

        //Admin Site settings route
        Route::get('/admin/sitesettings', [AdminController::class, 'sitesettings'])->name('admin.sitesettings');
        //Admin add pictures(Site settings) route
        Route::post('/admin/sitesettings/addpic', [AdminController::class, 'sitesettingsaddpic'])->name('admin.sitesettingsaddpic');
        //Admin update pictures(Site settings) route
        Route::post('/admin/sitesettings/updatepic/{id}', [AdminController::class, 'sitesettingsupdatepic'])->name('admin.sitesettingsupdatepic');
        //Admin delete pictures(Site settings) route
        Route::post('/admin/sitesettings/deletepic/{id}', [AdminController::class, 'sitesettingsdeletepic'])->name('admin.sitesettingsdeletepic');

        //Admin messaging route
        Route::get('/admin/sendmessage', [AdminController::class, 'sendmessage'])->name('admin.sendmessage');
        //Admin messaging process route
        Route::post('/admin/sendmessage', [AdminController::class, 'sendmessageto'])->name('admin.sendmessageto');

        //Admin Inbox route
        Route::get('/admin/inbox', [AdminController::class, 'inbox'])->name('admin.inbox');
        //Admin reply inbox route
        Route::post('/admin/myinbox/reply', [AdminController::class, 'replyinbox'])->name('admin.replyinbox');
        //Admin delete inbox route
        Route::post('/admin/myinbox/delete/{id}', [AdminController::class, 'deleteinbox'])->name('admin.deleteinbox');

        //Admin send money to user route
        Route::get('/admin/sendmoney', [AdminController::class, 'sendmoney'])->name('admin.sendmoney');
        //Admin send money to user process route
        Route::post('/admin/sendmoney/sendmoneyprocess', [AdminController::class, 'sendmoneyprocess'])->name('admin.sendmoneyprocess');
        //Admin send money success route
        Route::get('/admin/sendsuccess', [AdminController::class, 'sendsuccess'])->name('admin.sendsuccess');

        //Admin processing withdraws management route
        Route::get('/admin/withdraws', [AdminController::class, 'withdraws'])->name('admin.withdraws');
        //Admin update(processing withdraws management) route
        Route::post('/admin/withdraws/updatestate/{id}', [AdminController::class, 'withdrawalprocess'])->name('admin.withdrawalprocess');
    });


    /*User*/
    //Admin Role check
    Route::middleware(['user_check'])->group(function(){
        //User dashboard route
        Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.index');
        //User request card process route
        Route::post('/user/dashboard/requestcard', [UserController::class, 'requestcard'])->name('user.requestcard');

        //User show all transactions route
        Route::get('/user/transactions', [UserController::class, 'transactions'])->name('user.transactions');
        //User search in (show all transactions) route
        Route::get('/user/transactions/searchtransactions', [UserController::class, 'searchtransactions'])->name('user.searchtransactions');

        //User verification route
        Route::get('/user/verification', [UserController::class, 'verification'])->name('user.verification');
        //User file submission for verification route
        Route::post('/user/verification/uploadfiles', [UserController::class, 'userverification'])->name('user.uploadimage');

        //User send money to user route
        Route::get('/user/sendmoney', [UserController::class, 'sendmoney'])->name('user.sendmoney');
        //User sendmoney process route
        Route::post('/user/sendmoney/sendmoneyprocess', [UserController::class, 'sendmoneyprocess'])->name('user.sendmoneyprocess');
        //User sendmoney success route
        Route::get('/user/sendsuccess', [UserController::class, 'sendsuccess'])->name('user.sendsuccess');

        //User bank account route
        Route::get('/user/cardandbank', [UserController::class, 'cardandbank'])->name('user.cardandbank');
        //User add bank account route
        Route::post('/user/cardandbank/addbank', [UserController::class, 'addbank'])->name('user.addbank');
        //User delete bank account route
        Route::post('/user/cardandbank/deletebank/{id}', [UserController::class, 'deletebank'])->name('user.deletebank');
        /*Route::post('/user/cardandbank/addcard', [UserController::class, 'addcard'])->name('user.addcard');*/

        //User withdraw route
        Route::get('/user/withdraw', [UserController::class, 'withdraw'])->name('user.withdraw');
        //User withdraw request submit route
        Route::post('/user/withdraw/withdrawrequest', [UserController::class, 'withdrawreq'])->name('user.withdrawreq');
        //User withdraw request submit success route
        Route::get('/user/withdrawsuccess', [UserController::class, 'withdrawsuccess'])->name('user.withdrawsuccess');

        //User profile/account route
        Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
        //User personal details change route
        Route::post('/user/profile/personaldetails', [UserController::class, 'personaldatachange'])->name('user.personaldatachange');
        //User currency change route
        Route::post('/user/profile/currencysettings', [UserController::class, 'currencychange'])->name('user.currencychange');
        //User email change route
        Route::post('/user/profile/emailsettings', [UserController::class, 'emailchange'])->name('user.emailchange');
        //User password change route
        Route::post('/user/profile/passwordsettings', [UserController::class, 'passwordchange'])->name('user.passwordchange');

        //User seeking help route
        Route::get('/user/help', [UserController::class, 'help'])->name('user.help');
        //User send message for help route
        Route::post('/user/help/sendmessage', [UserController::class, 'sendmessage'])->name('user.sendmessage');
        //User inbox reply route
        Route::post('/user/help/myinbox/reply', [UserController::class, 'replyinbox'])->name('user.replyinbox');
        //User delete inbox route
        Route::post('/user/help/myinbox/delete/{id}', [UserController::class, 'deleteinbox'])->name('user.deleteinbox');

        //User deposit page route
        Route::get('/user/deposit', [UserController::class, 'deposit'])->name('user.deposit');
        //User deposit using paypal process route
        Route::get('/user/deposit/depositpaypal', [UserController::class, 'depositpaypal'])->name('user.depositpaypal');
        //User deposit using cards process route
        Route::post('/user/deposit/stripedeposit', [UserController::class, 'stripedeposit'])->name('user.stripedeposit');
        //User deposit success route
        Route::get('/user/depositsuccess', [UserController::class, 'depositsuccess'])->name('user.depositsuccess');
    });
});

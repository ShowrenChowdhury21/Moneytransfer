<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Verification;

class UserAuthController extends Controller
{
    //Login page
    public function login(){
        if(!session()->has('id')){
            return view('auth.login');
        }
        else{
            session()->flush();
            return view('auth.login')->with('fail','You must login first');
        }
    }
    //login page function end

    //Signup page
    public function signup(){
        return view('auth.signup');
    }
    public function forgetpassword(){
        return view('auth.forgetpassword');
    }
    //Signup page function end

    //signup process function
    public function signupprocess(Request $request){
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:users',
            'currency'=> 'required',
            'country'=> 'required',
            'password'=> 'required|min:8|max:26',
            'confirmpassword'=> 'required|min:8|max:26|same:password'

        ]);

        $idgen = mt_rand(10000000,99999999);

        $user = new User();
        $user->id = $idgen;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->currency = $request->currency;
        $user->country = $request->country;
        $user->password = Hash::make($request->password);
        $user->verification_code = sha1(time());
        $user->type = 'user';
        $query = $user->save();

        if($query){
            MailController::sendsignupemail($user->name, $user->email,$user->verification_code);
            return redirect()->back()->with('success','You have successfully Registered! Please check your email to verify!');
        }
        else{
            return redirect()->back()->with('fail','Something went wrong! Please try again!');
        }
    }
    //signup process function end

    //verify user function
    public function verifyuser(Request $request){
        $verification_code = $request->get('code');
        $user = User::where(['verification_code'=>$verification_code ])->first();
        if($user){
            $user->is_verified = 1;
            $user->save();
            return redirect()->route('auth.login')->with('success','Account Verified! Please Login.');
        }
        return redirect()->route('auth.login')->with('fail','Invalid Verification!');
    }
    //verify user function end

    //Login process and sending otp function
    public function loginprocess(Request $request){
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required|min:8|max:26',
        ]);

        $user = User::where('email','=',$request->email)->first();
        if($user)
        {
            if(Hash::check($request->password, $user->password))
            {
                if($user->is_verified == 1)
                {
                    $otp = mt_rand(100000,999999);
                    User::where('email', $request->email)->update(['otp' => $otp]);
                    MailController::otpemail($user->name, $user->email, $user->password, $otp );
                    return redirect()->route('auth.otp', ['email'=> $user->email]);
                }
                else{
                    return back()->with('fail','Verify Email to login!!');
                }
            }
            else{
                return back()->with('fail','Invalid password!');
            }
        }
        else{
            return back()->with('fail','No account found with this email!');
        }
    }
    //Login process and sending otp function end

    //Resend OTP process function
    public function resendotp($email){
        $otp = mt_rand(100000,999999);
        $user = User::where('email', $email)->first();
        User::where('email', $email)->update(['otp' => $otp]);
        MailController::otpemail($user->name, $user->email, $user->password, $otp );
        return redirect()->route('auth.otp', ['email'=> $user->email]);
    }
    //Resend OTP process function end

    //Show OTP page function
    public function otp($email) {
        return view('auth.otp', ['email'=> $email]);
    }
    //Show OTP page function end

    //OTP verification function
    public function otpverify(Request $request){
        $request->validate([
            'otp'=> 'required|min: 6| max: 6'
        ]);

        $user = User::where('email','=',$request->email)->first();
        if($user)
        {
            if($request->otp == $user->otp){
                $request->session()->put('id', $user->id);
                $request->session()->put('name', $user->name);
                $request->session()->put('email', $user->email);
                $request->session()->put('country', $user->country);
                $request->session()->put('currency', $user->currency);
                $request->session()->put('balance', $user->balance);
                $request->session()->put('type', $user->type);
                $request->session()->put('password', $user->password);

                if($user->type == "admin"){
                    return redirect()->route('admin.index');
                }
                if($user->type == "user"){
                    $verifieduser = Verification::where('email','=',$request->email)->first();
                    if($verifieduser){
                        if($verifieduser->is_verified == 1){
                            return redirect()->route('user.index');
                        }
                        else{
                            return redirect()->route('user.index')->with('warning','Verifictaion under process! We will let you know soon!');
                        }
                    }
                    else{
                        return redirect()->route('user.index')->with('warning','You must verify your account for transaction! Please go the verification section!');
                    }
                }
            }
            else {
                return back()->with('fail','Wrong OTP!');
            }
        }else{
            return back()->with('fail','Something went wrong! Please try again');
        }
    }
    //OTP verification function end

    //Forget password function
    public function forgetpasswordprocess(Request $request){
        $token = Str::random(60);
        $user = User::where('email','=',$request->email)->first();
        if($user){
            DB::table('password_resets')->insert(
                ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
            );

            MailController::forgetpassemail($user->name, $user->email, $token);
            return redirect()->back()->with('success','We have sent you a reset link. Please check your email');
        }
        else{
            return redirect()->back()->with('fail','No account found with this email!');
        }
    }
    //Forget password function end

    //Forget password(get password) function
    public function getPassword($email,$token) {

        return view('auth.resetpassword', ['email'=> $email,'token'=>$token]);
    }
    //Forget password(get password) function end

    //Forget password(update/change password) function
    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password'=> 'required|min:8|max:26',
            'confirmpassword'=> 'required|min:8|max:26|same:password'
        ]);
        $updatePassword = DB::table('password_resets') ->where(['email' => $request->email, 'token' => $request->token]) ->first();
        if($updatePassword){
            User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
            DB::table('password_resets')->where(['email'=> $request->email])->delete();
            return redirect()->route('auth.login')->with('success', 'Your password has been changed!');
        }
        else{
            return redirect()->back()->with('fail','Something went wrong!');
        }
    }
    //Forget password(update/change password) function end
}

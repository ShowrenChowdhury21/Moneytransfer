<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SignupEmail;
use App\Mail\ForgetPasswordEmail;
use App\Mail\OtpEmail;
use App\Mail\VerificationEmail;
use App\Mail\VerificationDeclineEmail;
use App\Mail\EmailChangedEmail;
use App\Mail\PasswordChangedEmail;
use App\Mail\SendMoneyEmail;
use App\Mail\RecieveMoneyEmail;
use App\Mail\WithdrawReqEmail;
use App\Mail\WithdrawReqRecEmail;
use App\Mail\WithdrawAcceptEmail;
use App\Mail\WithdrawDeclineEmail;
use App\Mail\DepositEmail;
use App\Mail\CardApproveEmail;
use App\Mail\CardDeclineEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //Send sign confirmation email
    public static function sendsignupemail($name, $email, $verification_code){
        $data=[
            'name' => $name,
            'verification_code' => $verification_code,
        ];
        Mail::to($email)->send(new SignupEmail($data));
    }

    //Send password reset email
    public static function forgetpassemail($name, $email, $token){
        $data=[
            'name' => $name,
            'email' => $email,
            'token' => $token,
        ];
        Mail::to($email)->send(new ForgetPasswordEmail($data));
    }

    //Send OTP email
    public static function otpemail($name, $email, $password, $otp){
        $data=[
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'otp' => $otp,
        ];
        Mail::to($email)->send(new OtpEmail($data));
    }

    //Send verification accept email
    public static function verificationmail($name, $email){
        $data=[
            'name' => $name,
            'email' => $email,
        ];
        Mail::to($email)->send(new VerificationEmail($data));
    }

    //Send verification decline email
    public static function verificationdeclinemail($name, $email){
        $data=[
            'name' => $name,
            'email' => $email,
        ];
        Mail::to($email)->send(new VerificationDeclineEmail($data));
    }

    //Send change email address email
    public static function emailchangedmail($name, $email){
        $data=[
            'name' => $name,
            'email' => $email,
        ];
        Mail::to($email)->send(new EmailChangedEmail($data));
    }

    //Send password change email
    public static function passwordchangedmail($name, $email){
        $data=[
            'name' => $name,
            'email' => $email,
        ];
        Mail::to($email)->send(new PasswordChangedEmail($data));
    }

    //Send 'send money with amount' email
    public static function sendmoneymail($name, $email, $currency, $toemail, $amount){
        $data=[
            'name' => $name,
            'email' => $email,
            'currency' => $currency,
            'amount' => $amount,
            'toemail' => $toemail
        ];
        Mail::to($email)->send(new SendMoneyEmail($data));
    }

    //Send 'recieve money with amount' email
    public static function recievemoneymail($name, $email, $currency, $fromemail, $amount){
        $data=[
            'name' => $name,
            'email' => $email,
            'currency' => $currency,
            'amount' => $amount,
            'fromemail' => $fromemail
        ];
        Mail::to($email)->send(new RecieveMoneyEmail($data));
    }

    //Send withdraw request email
    public static function withdrawrequestmail($name, $email, $currency, $amount){
        $data=[
            'name' => $name,
            'email' => $email,
            'currency' => $currency,
            'amount' => $amount,
        ];
        Mail::to($email)->send(new WithdrawReqEmail($data));
    }

    //Send withdraw request recieve email
    public static function withdrawrequestrecievemail($name, $email, $currency, $fromemail, $amount){
        $data=[
            'name' => $name,
            'email' => $email,
            'fromemail' => $fromemail,
            'currency' => $currency,
            'amount' => $amount,
        ];
        Mail::to($email)->send(new WithdrawReqRecEmail($data));
    }

    //Send withdraw request approval email
    public static function withdrawacceptmail($email, $transactionid,$currency, $amount){
        $data=[
            'email' => $email,
            'transactionid' => $transactionid,
            'currency' => $currency,
            'amount' => $amount,
        ];
        Mail::to($email)->send(new WithdrawAcceptEmail($data));
    }

    //Send withdraw request decline email
    public static function withdrawdeclinemail($email, $transactionid,$currency, $amount){
        $data=[
            'email' => $email,
            'transactionid' => $transactionid,
            'currency' => $currency,
            'amount' => $amount,
        ];
        Mail::to($email)->send(new WithdrawDeclineEmail($data));
    }

    //Send depoist with amount email
    public static function depositmail($email, $transactionid, $currency, $total){
        $data=[
            'email' => $email,
            'transactionid' => $transactionid,
            'currency' => $currency,
            'total' => $total,
        ];
        Mail::to($email)->send(new DepositEmail($data));
    }

    //Send card request approval email
    public static function cardapprovemail($name, $email){
        $data=[
            'name' => $name,
            'email' => $email,
        ];
        Mail::to($email)->send(new CardApproveEmail($data));
    }

    //Send card request decline email
    public static function carddeclinemail($name, $email){
        $data=[
            'name' => $name,
            'email' => $email,
        ];
        Mail::to($email)->send(new CardDeclineEmail($data));
    }
}

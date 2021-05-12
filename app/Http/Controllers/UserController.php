<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\FrontendImage;
use App\Models\CustomerMessage;
use App\Models\Transaction;
use App\Models\Bank;
use App\Models\Verification;
use App\Models\RequestCard;
use Carbon\Carbon;
use Stripe;

class UserController extends Controller
{
    ///////////User index/dashboard
    //shows 10 transactions with balance information
    function index(){
        $transactions = Transaction::where('sender','=',session()->get('email'))->orWhere('reciever','=',session()->get('email'))->take(10)->get();
        return view('User.index')->with('transactions', $transactions);
    }

    //request card function
    function requestcard(Request $request){
        $transactions = Transaction::where('sender','=',session()->get('email'))->orWhere('reciever','=',session()->get('email'))->take(10)->get();
        $verified = Verification::where('email','=',$request->session()->get('email'))->first();

        if(($verified->is_verified) == 1){
            $carduserold = RequestCard::where('email','=',$request->session()->get('email'))->first();

            if($carduserold){
                return redirect()->route('user.index')->with('transactions', $transactions)
                                        ->with('fail',"You already have requested for card");
            }
            else{
                $carduser = new RequestCard();
                $carduser->id = $request->session()->get('id');
                $carduser->name = $request->session()->get('name');
                $carduser->email = $request->session()->get('email');
                $carduser->cardno = "9669".mt_rand(100000000000,999999999999);
                $carduser->address = $request->address;
                $carduser->cardcode = mt_rand(1000,9999);
                $carduser->expiredate = Carbon::now()->addYears(4);
                $carduser->save();

                return redirect()->route('user.index')->with('transactions', $transactions)
                                                    ->with('Success',"Card request successfully sent to admin");
            }
        }
        else{
            return redirect()->route('user.index')->with('transactions', $transactions)
                                                     ->with('fail',"You need to validate account!");
        }
    }
    ///////////User index/dashboard end

    /////////User transaction
    //show transaction details
    function transactions(){
        $transactions = Transaction::where('sender','=',session()->get('email'))->orWhere('reciever','=',session()->get('email'))->paginate(10);
        return view('User.transactions')->with('transactions', $transactions);
    }

    //search transaction details
    function searchtransactions(Request $request){
        $transactions = Transaction::whereBetween('created_at', [$request->fromdate.' 00:00:00', $request->todate.' 23:59:59'])->get();

        return response()->json($transactions);
    }
    /////////User transaction end

    ////////////User verification
    //verification form page
    function verification(){
        return view('user.verification');
    }

    //User verification request function
    public function userverification(Request $request){
        $id = $request->session()->get('id');
        $name = $request->session()->get('name');
        $email = $request->session()->get('email');
        /*$request->validate([
            'documenttype' => 'required',
            'frontpic' => 'required|image|mimes:png,jpg,jpeg|max:5048',
            'backpic' => 'required|image|mimes:png,jpg,jpeg|max:5048'
        ]);*/

        if(($request->hasfile('frontpic')) && ($request->hasfile('backpic'))){
            $imagefront = $request->file('frontpic');
            $imageback = $request->file('backpic');
            $imgfront = time().'.'. mt_rand(100000,999999) . '.' . $imagefront->getClientOriginalExtension();
            $imgback = time().'.'. mt_rand(100000,999999) . '.' . $imageback->getClientOriginalExtension();
            $imagefront->move(public_path('uploads/user/img'), $imgfront);
            $imageback->move(public_path('uploads/user/img'), $imgback);

            $user = new Verification();
            $user->id = $id;
            $user->name = $name;
            $user->email = $email;
            $user->documenttype = $request->documenttype;
            $user->frontpic = $imgfront;
            $user->backpic = $imgback;
            $user->save();

            return redirect()->route('user.verification')->with('success',"Files are submitted for verification! We will let you know soon!");
        }
        else{
            return redirect()->route('user.verification')->with('fail',"Something went wrong!");
        }
    }
    /////////////User verification end

    /////////////User send money
    //send money input page
    function sendmoney(){
        return view('User.sendmoney');
    }

    //send money process function
    function sendmoneyprocess(Request $request){
        $request->validate([
            'email' => 'required|email',
            'yousend' => 'required|regex:/^\d{1,13}(\.\d{1,4})?$/',
        ]);

        $sender = User::where('email','=',$request->session()->get('email'))->first();
        $moneyreciever = User::where('email','=',$request->email)->first();
        $verified = Verification::where('email','=',$request->session()->get('email'))->first();

        if(($verified->is_verified) == 1 ){
            if(($moneyreciever->is_verified) == 1){
                $validreciever = User::where('email','=',$request->email)->first();
                if($validreciever){
                    if($request->email != $request->session()->get('email')){
                        if($request->session()->get('balance') > ($request->yousend)){
                            $characters = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                            $string = substr(str_shuffle($characters), 0, 12);

                            $transaction = new Transaction();
                            $transaction->sender = $request->session()->get('email');
                            $transaction->sendercurrency = $request->session()->get('currency');
                            $transaction->amountsend = $request->yousend;
                            $transaction->reciever = $request->email;
                            $transaction->reference = $request->reference;
                            $transaction->id = $string;
                            $transaction->sendtype = "Send Money";
                            $transaction->sendertype = $request->session()->get('type');

                            $sendercurrency = $request->session()->get('currency');
                            $recievercurrency = $moneyreciever->currency;
                            $apikey = 'cc2ded1dc883821ccfcb';
                            $query =  "{$sendercurrency}_{$recievercurrency}";
                            $json = file_get_contents("http://free.currencyconverterapi.com/api/v5/convert?q={$query}&compact=y&apiKey={$apikey}");
                            $obj = json_decode($json, true);
                            $val = $obj["$query"];
                            $total = $val['val'] * $request->yousend;

                            $transaction->recievercurrency = $moneyreciever->currency;
                            $transaction->amountrecieved = $total;

                            $moneyreciever->balance = $moneyreciever->balance + $total;


                            $sender->balance = $sender->balance - $request->totalamount;

                            $request->session()->put('balance', $sender->balance);

                            MailController::sendmoneymail($request->session()->get('name'), $request->session()->get('email'),$request->session()->get('currency'), $request->email, $request->yousend);
                            MailController::recievemoneymail($moneyreciever->name, $request->email,$moneyreciever->currency, $request->session()->get('email'), $total);

                            $transaction->save();
                            $moneyreciever->save();
                            $sender->save();

                            return redirect()->route('user.sendsuccess');
                        }
                        else{
                            return redirect()->route('user.sendmoney')->with('fail','You do not have enough balance!');
                        }
                    }
                    else{
                        return redirect()->route('user.sendmoney')->with('fail','You cannot send money on your own account!');
                    }
                }
                else{
                    return redirect()->route('user.sendmoney')->with('fail','User does not exist!');
                }
            }
            else{
                redirect()->route('user.sendmoney')->with('fail','Reciever account must be verified!');
            }
        }
        else{
            redirect()->route('user.sendmoney')->with('fail','Verify your account for transaction!');
        }
    }

    //send success page
    function sendsuccess(){
        return view('User.sendsuccess');
    }
    /////////////User send money end


    /////////////User cardandbank
    //show user bank account details
    function cardandbank(){
        $banks = DB::table('banks')->where('id', session()->get('id'))->select('bankname','accounttype','accountno')->get();
        return view('User.cardandbank')->with('banks',$banks);
    }

    //add bank acounts function
    function addbank(Request $request){
        $user=User::where('id','=',session()->get('id'))->first();
        $verified = Verification::where('email','=',$request->session()->get('email'))->first();

        if($verified->is_verified == 1){
            $bank = Bank::where('id','=',session()->get('id'))->where('mediumtype','=','bank')->count();
            $bankno = Bank::where('accountno','=',$request->accountno)->first();
            if($bankno == null){
                if($bank >=  2){
                    return redirect()->route('user.cardandbank')->with('fail','Maximum 2 bank accounts can be added!');
                }
                else{
                        $bankuser = new Bank();
                        $bankuser->id = $request->session()->get('id');
                        $bankuser->country = $request->session()->get('country');
                        $bankuser->mediumtype = "bank";
                        $bankuser->bankname = $request->bankname;
                        $bankuser->accounttype = $request->accounttype;
                        $bankuser->accountname = $request->accountname;
                        $bankuser->accountno = $request->accountno;
                        $bankuser->ifscCode = encrypt($request->ifscCode);

                        $bankuser-> save();

                        return redirect()->route('user.cardandbank')->with('success','Bank account added successfully!');
                }
            }
            else{
                return redirect()->route('user.cardandbank')->with('fail','Account number already included!');
            }
        }
        else{
            return redirect()->route('user.cardandbank')->with('fail','Varify your account!');
        }
    }

    /*function addcard(Request $request){
        $request->validate([
            'cardtype' => 'required',
            'cardno' => 'required',
            'holdername' => 'required',
            'expiredate' => 'required',
            'cvv' => 'required',
        ]);

        $card = Cardandbank::where('id','=',session()->get('id'))->where('mediumtype','=','card')->count();

        if($card <= 2){
            $carduser = new Cardandbank();
            $carduser->id = $request->session()->get('id');
            $carduser->country = $request->session()->get('country');
            $carduser->mediumtype = "card";
            $carduser->cardtype = $request->cardtype;
            $carduser->cardno = $request->cardno;
            $carduser->holdername = $request->holdername;
            $carduser->expiredate = $request->expiredate;
            $carduser->cvv = $request->cvv;
            $carduser-> save();

            return redirect()->route('user.cardandbank')->with('success','Bank account added successfully!');
        }
        else{
            return redirect()->route('user.cardandbank')->with('fail','Maximum 2 bank accounts can be added!');
        }


    }*/

    //delete bank account function
    function deletebank($id,Request $request){
        DB::table('banks')->where('accountno', $id)->delete();
        return redirect()->route('user.cardandbank')->with('success',"Deletion Successfull!");
    }
    //////////////User cardandbank end

    ////////////////User withdraw
    //withdraw input page
    function withdraw(){
        $banks = Bank::where('id','=',session()->get('id'))->where('mediumtype','=','bank')->get();
        return view('User.withdraw')->with('banks',$banks);
    }

    //withdraw request process function
    function withdrawreq(Request $request){
        $verified = Verification::where('email','=',$request->session()->get('email'))->first();
        if(($verified->is_verified) == 1){
            $bankinfo = Bank::where('id','=',session()->get('id'))->where('accountno','=',$request->withdrawto)->first();
            if($bankinfo){
                if($request->session()->get('balance') >= ($request->yousend)){
                    $characters = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $string = substr(str_shuffle($characters), 0, 12);

                    $transaction = new Transaction();
                    $transaction->sender = $request->session()->get('email');
                    $transaction->sendercountry = $request->session()->get('country');
                    $transaction->sendercurrency = $request->session()->get('currency');
                    $transaction->amountsend = $request->yousend;
                    $transaction->id = $string;
                    $transaction->sendtype = "withdraw";
                    $transaction->state = "pending";
                    $transaction->sendertype = $request->session()->get('type');

                    $transaction->bankname = $bankinfo->bankname;
                    $transaction->accounttype = $bankinfo->accounttype;
                    $transaction->accountname = $bankinfo->accountname;
                    $transaction->accountno = $bankinfo->accountno;
                    $transaction->ifsccode = $bankinfo->ifsccode;


                    $moneyreciever = User::where('type','=','admin')->first();
                    $sendercurrency = $request->session()->get('currency');
                    $recievercurrency = $moneyreciever->currency;
                    $apikey = 'cc2ded1dc883821ccfcb';
                    $query =  "{$sendercurrency}_{$recievercurrency}";
                    $json = file_get_contents("http://free.currencyconverterapi.com/api/v5/convert?q={$query}&compact=y&apiKey={$apikey}");
                    $obj = json_decode($json, true);
                    $val = $obj["$query"];
                    $total = $val['val'] * $request->yousend;

                    $transaction->recievercurrency = $moneyreciever->currency;
                    $transaction->amountrecieved = $total;

                    $sender = User::where('email','=',$request->session()->get('email'))->first();
                    $sender->balance = $sender->balance - $request->totalamount;
                    $request->session()->put('balance', $sender->balance);


                    MailController::withdrawrequestmail($request->session()->get('name'), $request->session()->get('email'),$request->session()->get('currency'), $request->yousend);
                    MailController::withdrawrequestrecievemail($moneyreciever->name, $moneyreciever->email,$moneyreciever->currency,$request->session()->get('email'), $total);

                    $transaction->save();
                    $moneyreciever->save();
                    $sender->save();

                    return redirect()->route('user.withdrawsuccess');
                }
                else{
                    return redirect()->route('user.withdraw')->with('fail','You do not have enough balance!');
                }
            }
            else{
                return redirect()->route('user.withdraw')->with('fail','Something went wrong!');
            }
        }
        else{
            return redirect()->route('user.withdraw')->with('fail','Verify your account!');
        }
    }

    //withdraw success page
    function withdrawsuccess(){
        return view('User.withdrawsuccess');
    }
    //////////////User withdraw end


    ///////////////User profile/account
    //show user details
    function profile(){
        return view('User.profile');
    }

    //update personal details function
    function personaldatachange(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
        $user = User::find($request->session()->get('id'));
        $user->name = $request->name;
        $user->country = $request->country;
        $user->save();

        $request->session()->put('name', $user->name);
        $request->session()->put('country', $user->country);

        return redirect()->route('user.profile')->with('success','Details changed successfully.');
    }

    //update currency function
    function currencychange(Request $request){
        $request->validate([
            'currency' => 'required',
        ]);
        $user = User::find($request->session()->get('id'));
        $user->currency = $request->currency;
        $user->save();

        $request->session()->put('currency', $user->currency);

        return redirect()->route('user.profile')->with('success','Currency changed successfully.');
    }

    //update email function
    function emailchange(Request $request){
        $request->validate([
            'email'=> 'required|email|unique:users',
        ]);
        $user = User::find($request->session()->get('id'));
        $user->email = $request->email;
        $user->save();

        $request->session()->put('email', $user->email);

        MailController::emailchangedmail($user->name, $user->email);

        return redirect()->route('user.profile')->with('success','Email changed successfully.');
    }

    //update password function
    function passwordchange(Request $request){
        $request->validate([
            'currentpassword' => 'required',
            'newpassword'=> 'required|min:8|max:26',
            'confirmnewpassword'=> 'required|min:8|max:26|same:newpassword'
        ]);

        $user = User::find($request->session()->get('id'));

        if(Hash::check($request->currentpassword, $user->password)){

            $user->password = Hash::make($request->newpassword);
            $user->save();

            MailController::passwordchangedmail($user->name, $user->email);
            return redirect()->route('user.profile')->with('success','Password changed successfully.');
        }
        else{
            return redirect()->route('user.profile')->with('fail','Current password did not match.');
        }
    }
    //////////////User profile/account end

    //////////////help
    //show send message page and inbox
    function help(){
        $messages = CustomerMessage::where('reciever', session()->get('email'))->paginate(10);;
        return view('User.help')->with('messages',$messages);
    }

    //send message to admin for help function
    function sendmessage(Request $request){
        $request->validate([
            'subject' => 'required',
            'messagebody' => 'required',
        ]);

        $files = [];

        if($request->hasfile('attachments'))
        {
           foreach($request->file('attachments') as $file)
           {
               $filename = time().rand(1000,9000).'.'.$file->getClientOriginalExtension();
               $file->move(public_path('uploads/MessageFiles'), $filename);
               $files[] = $filename;
           }
        }

        $message = new CustomerMessage();
        $message->id = mt_rand(100000,999999);
        $message->sender = $request->session()->get('email');
        $message->subject = $request->subject;
        $message->message = $request->messagebody;
        $message->files = implode(",",$files);
        $message->recusertype = 'admin';

        $val = $message->save();

        if($val){
            return redirect()->route('user.help')->with('success',"Message Sent!!");
        }
        else{
            return redirect()->route('user.help')->with('fail',"Message sending failed!!");
        }

    }

    //reply inbox function
    function replyinbox(Request $request){
        $request->validate([
            'subject' => 'required',
            'messagebody' => 'required',
        ]);

        $files = [];

        if($request->hasfile('attachments'))
        {
           foreach($request->file('attachments') as $file)
           {
               $filename = time().rand(1000,9000).'.'.$file->getClientOriginalExtension();
               $file->move(public_path('uploads/MessageFiles'), $filename);
               $files[] = $filename;
           }
        }


        $message = new CustomerMessage();
        $message->id = mt_rand(100000,999999);
        $message->sender = $request->session()->get('email');
        $message->subject = $request->subject;
        $message->message = $request->messagebody;
        $message->files = implode(",",$files);
        $message->recusertype = 'admin';
        $val = $message->save();

        if($val){
            return redirect()->route('user.help')->with('success',"Message Sent!!");
        }
        else{
            return redirect()->route('user.help')->with('fail',"Message sending failed!!");
        }
    }

    //delete inbox function
    function deleteinbox($id,Request $request){
        if(CustomerMessage::destroy($id)){
            return redirect()->route('user.help')->with('success',"Deletion Successfull!");
        }
    }
    ///////////////help end


    ///////////////User deposit
    //show deoposit page
    function deposit(Request $request ){
        $verified = Verification::where('email','=',$request->session()->get('email'))->first();
        if(($verified->is_verified) == 1){
            return view('User.deposit');
        }
        else{
            return redirect()->route('user.verification')->with('fail',"Oopss!! Account not verified! You need to validate account to Deposit!!!");
        }
    }

    //deposit with paypal process function
    function depositpaypal(Request $request){
        $sendercurrency = "USD";
        $recievercurrency = $request->session()->get('currency');
        $apikey = 'cc2ded1dc883821ccfcb';
        $query =  "{$sendercurrency}_{$recievercurrency}";
        $json = file_get_contents("http://free.currencyconverterapi.com/api/v5/convert?q={$query}&compact=y&apiKey={$apikey}");
        $obj = json_decode($json, true);
        $val = $obj["$query"];
        $total = $val['val'] * $request->amount;


        $user = User::where('email', $request->session()->get('email'))->first();
        $user->balance = $user->balance + $total;
        $user->save();

        $characters = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = substr(str_shuffle($characters), 0, 12);

        $transaction = new Transaction();
        $transaction->sender = $request->session()->get('email');
        $transaction->sendercountry = $request->session()->get('country');
        $transaction->sendercurrency = $request->session()->get('currency');
        $transaction->amountsend = $total;
        $transaction->recievercurrency = "USD";
        $transaction->amountrecieved = $request->amount;
        $transaction->id = $string;
        $transaction->sendtype = "deposit";
        $transaction->sendertype = $request->session()->get('type');
        $transaction->save();

        $request->session()->put('balance', $user->balance);
        MailController::depositmail($request->session()->get('email'), $transaction->id, $request->session()->get('currency'), $total);

        return response()->json(['success','Amount Deposited Successfully!']);
    }

    //deposit with card process function
    public function stripedeposit(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->striedepositamount *100,
                "currency" => "USD",
                "source" => $request->stripeToken,
                "description" => $request->session()->get('email'),
        ]);


        $sendercurrency = "USD";
        $recievercurrency = $request->session()->get('currency');
        $apikey = 'cc2ded1dc883821ccfcb';
        $query =  "{$sendercurrency}_{$recievercurrency}";
        $json = file_get_contents("http://free.currencyconverterapi.com/api/v5/convert?q={$query}&compact=y&apiKey={$apikey}");
        $obj = json_decode($json, true);
        $val = $obj["$query"];
        $total = $val['val'] * $request->striedepositamount;


        $user = User::where('email', $request->session()->get('email'))->first();
        $user->balance = $user->balance + $total;
        $user->save();

        $characters = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = substr(str_shuffle($characters), 0, 12);

        $transaction = new Transaction();
        $transaction->sender = $request->session()->get('email');
        $transaction->sendercountry = $request->session()->get('country');
        $transaction->sendercurrency = $request->session()->get('currency');
        $transaction->amountsend = $total;
        $transaction->recievercurrency = "USD";
        $transaction->amountrecieved = $request->striedepositamount;
        $transaction->id = $string;
        $transaction->sendtype = "deposit";
        $transaction->sendertype = $request->session()->get('type');
        $transaction->save();

        $request->session()->put('balance', $user->balance);
        MailController::depositmail($request->session()->get('email'),$transaction->id, $request->session()->get('currency'), $total);

        return redirect()->route('user.depositsuccess');
    }

    //deposit success
    function depositsuccess(){
        return view('User.depositsuccess');
    }
    //////////////////User deposit end

}


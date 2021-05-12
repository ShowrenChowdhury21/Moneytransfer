<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Verification;
use App\Models\FrontendImage;
use App\Models\CustomerMessage;
use App\Models\Transaction;
use App\Models\RequestCard;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    /////////////index/dashboard
    function index(){
        $days = Carbon::now()->subDays(30);
        $count = User::where('type','=','user')->count();
        $countlastthirty = User::where('type','=','user')->where('created_at',">",$days)->count();


        $counttrans = Transaction::count();
        $counttranslastthirty = Transaction::where('created_at',">",$days)->count();

        $pendingwithdraw = Transaction::where('state',"=",'pending')->count();
        $totalwithdraw = Transaction::where('sendtype',"=",'withdraw')->where('state',"=",'accepted')->sum('amountrecieved');
        $totaldeposit = Transaction::where('sendtype',"=",'deposit')->sum('amountrecieved');

        $months = [];
        $monthly_user_values = [];

        for($i=1; $i<=12; $i++){
            if(count(User::whereMonth('created_at',$i)->whereYear('created_at',date('Y'))->get()) != 0){
                $months[count($months)] = Carbon::parse(User::whereMonth('created_at',$i)->first()->created_at)->format('M');
                $monthly_user_values[count($monthly_user_values)] = count(User::whereMonth('created_at',$i)->whereYear('created_at',date('Y'))->get());
            }
        }

        return view('Admin.index')->with('count',$count)
                                  ->with('countlastthirty',$countlastthirty)
                                  ->with('counttrans',$counttrans)
                                  ->with('counttranslastthirty',$counttranslastthirty)
                                  ->with('pendingwithdraw',$pendingwithdraw)
                                  ->with('totalwithdraw',$totalwithdraw)
                                  ->with('totaldeposit',$totaldeposit)
                                  ->with('months',$months)
                                  ->with('monthly_user_values',$monthly_user_values);
    }
    ////////////index/dashboard end

    ////////////usermanagement
    //show all users function
    function users(){
        $users = DB::table('users')->where('type', 'user')->select('id','name','email','country','currency','balance','status')->paginate(10);
        return view('Admin.usermanagement')->with('users',$users);
    }

    //update user regarding id function
    public function updateuser($id, Request $request){
        $request->validate([
          'name' => 'required',
          'email' => 'required|email',
          'status' => 'required'
        ]);

          $user = User::find($id);
          $user->name         = $request->name;
          $user->email        = $request->email;
          $user->status        = $request->status;
          $user->save();

          $verifieduser = Verification::find($id);
          $verifieduser->name = $request->name;
          $verifieduser->email = $request->email;

          $verifieduser->save();

          return redirect()->route('admin.usermanagement')->with('success',"Update Successfull!");;
    }

    //delete user regarding id function
    public function deleteuser($id, Request $request){
        if(User::destroy($id)){
            Verification::destroy($id);
            return redirect()->route('admin.usermanagement')->with('success',"Deletion Successfull!");
        }
    }
    ////////////usermanagement end

    ///////////userverification
    //show verification table function
    function userverification(){
        $users = DB::table('verifications')->select('id','name','documenttype','frontpic','backpic','is_verified')->paginate(10);
        return view('Admin.userverification')->with('users',$users);
    }

    //update user verification status funtion
    function updateuserverification(Request $request){
        $user = Verification::find($request->user_id);
        $user->is_verified = $request->status;
        $user->save();

        $verificationstatus = Verification::find($request->user_id);
        if($verificationstatus->is_verified == "1"){
            MailController::verificationmail($verificationstatus->name, $verificationstatus->email);
        }
        elseif($verificationstatus->is_verified == "0"){
            MailController::verificationdeclinemail($verificationstatus->name, $verificationstatus->email);
        }

        return response()->json(['success','Verification Status changed successfully!']);
    }
    /////////////userverification end


    ////////////myaccount
    //show user account detils
    function myaccount(){
        return view('Admin.myaccount');
    }

    //update personal details function
    function personaldatachange(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
        $user = User::find($request->session()->get('id'));
        $user->name = $request->name;
        $user->save();

        $request->session()->put('name', $user->name);

        return redirect()->route('admin.myaccount')->with('success','Name changed successfully.');
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
        return redirect()->route('admin.myaccount')->with('success','Email changed successfully.');
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
            return redirect()->route('admin.myaccount')->with('success','Password changed successfully.');
        }
        else{
            return redirect()->route('admin.myaccount')->with('fail','Current password did not match.');
        }
    }
    /////////////myaccount end


    /////////////Site Settings
    //Show all front end images
    function sitesettings(){
        $pics = DB::table('frontend_images')->select('id','viewpagename','pagesectionname','picturetype','image')->paginate(10);
        return view('Admin.sitesettings')->with('pics',$pics);
    }

    //Add images or videos for frontend fucntion
    function sitesettingsaddpic(Request $request){
        $request->validate([
            'viewpagename' => 'required',
            'pagesectionname' => 'required',
            'picturetype' => 'required',
        ]);

        if(($request->hasfile('frontimage'))){
            $image = $request->file('frontimage');
            $img = time().'.'. mt_rand(10000,99999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/admin/site/img'), $img);

            $id = mt_rand(1000,9999);
            $viewpagename = $request->viewpagename;
            $pagesectionname = $request->pagesectionname;
            $picturetype = $request->picturetype;

            $values = array(
                'id'=>$id,
                'viewpagename' => $viewpagename,
                'pagesectionname' => $pagesectionname,
                'picturetype' => $picturetype,
                'image' => $img
            );

            DB::table('frontend_images')->insert($values);

            return redirect()->route('admin.sitesettings')->with('success',"Upload Successfull!");
        }
        else{
            return redirect()->route('admin.sitesettings')->with('fail',"Something went wrong!");
        }
    }

    //Update images or videos details for frontend fucntion
    function sitesettingsupdatepic($id,Request $request){
        $request->validate([
            'viewpagename' => 'required',
            'pagesectionname' => 'required',
            'picturetype' => 'required',
          ]);

            $pic = FrontendImage::find($id);
            $pic->viewpagename = $request->viewpagename;
            $pic->pagesectionname = $request->pagesectionname;
            $pic->picturetype = $request->picturetype;
            $pic->save();

          return redirect()->route('admin.sitesettings')->with('success',"Update Successfull!");
    }

    //delete images or videos for frontend fucntion
    function sitesettingsdeletepic($id,Request $request){
        if(FrontendImage::destroy($id)){
            $pic = FrontendImage::find($id);
            File::delete($pic->image);
            return redirect()->route('admin.sitesettings')->with('success',"Deletion Successfull!");
        }
    }
    /////////////sitesettings end

    /////////////send message
    //sending page
    function sendmessage(){
        return view('Admin.sendmessage');
    }

    //sending page process function
    function sendmessageto(Request $request){
        $request->validate([
            'sendto' => 'required',
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

        $reciever = User::where('email','=',$request->sendto)->first();

        if($reciever){
            $message = new CustomerMessage();
            $message->id = mt_rand(100000,999999);
            $message->sender = $request->session()->get('email');
            $message->subject = $request->subject;
            $message->message = $request->messagebody;
            $message->files = implode(",",$files);
            $message->reciever = $request->sendto;
            $message->recusertype = $reciever->type;
            $val = $message->save();

            if($val){
                return redirect()->route('admin.sendmessage')->with('success',"Message Sent!!");
            }
            else{
                return redirect()->route('admin.sendmessage')->with('fail',"Message sending failed!!");
            }
        }
        else{
            return redirect()->route('admin.sendmessage')->with('fail',"Reciever Not Found!!");
        }
    }
    ////////////send message end

    ////////////inbox
    //show all inbox
    function inbox(){
        $messages = CustomerMessage::where('recusertype', 'admin')->paginate(10);
        return view('Admin.inbox')->with('messages',$messages);
    }

    //reply inbox message function
    function replyinbox(Request $request){
        $request->validate([
            'to' => 'required',
            'subject' => 'required',
            'emailbody' => 'required',
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

        $reciever = User::where('email','=',$request->to)->first();

        if($reciever){
            $message = new CustomerMessage();
            $message->id = mt_rand(100000,999999);
            $message->sender = $request->session()->get('email');
            $message->subject = $request->subject;
            $message->message = $request->emailbody;
            $message->files = implode(",",$files);
            $message->reciever = $request->to;
            $message->recusertype = $reciever->type;
            $val = $message->save();

            if($val){
                return redirect()->route('admin.inbox')->with('success',"Reply Sent!!");
            }
            else{
                return redirect()->route('admin.inbox')->with('fail',"Reply sending failed!!");
            }
        }
        else{
            return redirect()->route('admin.inbox')->with('fail',"Reciever Not Found!!");
        }
    }

    //delete inbox message function
    function deleteinbox($id,Request $request){
        if(CustomerMessage::destroy($id)){
            return redirect()->route('admin.inbox')->with('success',"Deletion Successfull!");;
        }
    }
    ////////////inbox end

    ////////////send money
    //send money landing page
    function sendmoney(){
        return view('Admin.sendmoney');
    }

    //send money to user pprocess page
    function sendmoneyprocess(Request $request){
        $request->validate([
            'email' => 'required|email',
            'yousend' => 'required|regex:/^\d{1,13}(\.\d{1,4})?$/',
        ]);
        if($request->email != $request->session()->get('email')){
            if($request->yousend > 10){
                $characters = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $string = substr(str_shuffle($characters), 0, 12);

                $transaction = new Transaction();
                $transaction->sender = 'admin';
                $transaction->sendercurrency = $request->session()->get('currency');
                $transaction->amountsend = $request->yousend;
                $transaction->reciever = $request->email;
                $transaction->reference = $request->reference;
                $transaction->id = $string;
                $transaction->sendtype = "Send Money";
                $transaction->sendertype = $request->session()->get('type');

                $moneyreciever = User::where('email','=',$request->email)->first();
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

                MailController::sendmoneymail($request->session()->get('name'), $request->session()->get('email'),$request->session()->get('currency'), $request->email, $request->yousend);
                MailController::recievemoneymail($moneyreciever->name, $request->email,$moneyreciever->currency, $request->session()->get('type'), $total);

                $transaction->save();
                $moneyreciever->save();

                return redirect()->route('admin.sendsuccess');
            }
            else{
                return redirect()->route('admin.sendmoney')->with('fail','Send money must be at least $10.');
            }
        }
        else{
            return redirect()->route('admin.sendmoney')->with('fail','You cannot send money on your own account!');
        }

    }

    //send money success page
    function sendsuccess(){
        return view('Admin.sendsuccess');
    }
    /////////////send money end

    ////////////withdraws
    //withdraw request details page
    function withdraws(){
        $withdraws = DB::table('transactions')->where('sendtype','withdraw')->select('id','sender','sendercountry','amountrecieved','bankname','accounttype','accountname','accountno','ifsccode','state')->get();
        return view('Admin.withdraws')->with('withdraws',$withdraws);
    }

    //withdraw request process page
    function withdrawalprocess($id,Request $request){
        $transaction = Transaction::where('id','=',$id)->first();
        $transaction->id  = $request->transactionid;
        $transaction->state  = $request->status;
        $transaction->save();

        if(($transaction->state) == 'accepted'){
             MailController::withdrawacceptmail($transaction->sender, $transaction->id, $transaction->sendercurrency, $transaction->amountsend);
        }
        elseif(($transaction->state) == 'declined'){
            $user = User::where('email','=',$transaction->sender)->first();
            $user->balance = $user->balance + $transaction->amountsend + ($transaction->amountsend * 0.03);
            $user->save();
            MailController::withdrawdeclinemail($transaction->sender, $transaction->id, $transaction->sendercurrency, $transaction->amountsend);
        }

        return redirect()->route('admin.withdraws')->with('success',"Update Successfull!");
    }
    /////////////withdraws end

    /////////////cardrequests
    //show all requests for card
    function cardrequests(){
        $usercards = RequestCard::paginate(10);
        return view('Admin.cardrequests')->with('usercards',$usercards);
    }

    //Update status for all requests for card function
    function updatecardrequests($cardno,Request $request){
        $usercards = RequestCard::where('cardno','=',$cardno)->first();
        $usercards->state  = $request->status;
        $usercards->save();

        if(($usercards->state) == 'accepted'){
             MailController::cardapprovemail($usercards->name, $usercards->email);
        }
        elseif(($usercards->state) == 'declined'){
            MailController::carddeclinemail($usercards->name, $usercards->email);
        }

        return redirect()->route('admin.cardrequests')->with('success',"Update Successfull!");
    }
    ///////////cardrequests end
}

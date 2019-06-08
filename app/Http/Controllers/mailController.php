<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendEmail;
use DB;
//use Illuminate\Support\Facades\Password;
//use BlockIoPhp\BlockIoPhp\Lib\BlockIo;
//use BlockIoPhp\BlockIoPhp\Lib\BlockKey;

class mailController extends Controller
{
    
   
    public function home($value = null){
       // $this->version = 2;
        return view('mail.home');
    }

    public function sendemail(Request $get){
       
        $this->validate($get, [
           
            'email' => 'required',
            
            ]);

        $email = $get->email;
        $subject = 'Reset password';
        $massage = "http://localhost:8000/resetfogotton/$email";

      
    Mail::to( $email)->send( new SendEmail($subject, $massage) );

    
    
    }

    public function resethome($token){
    
      
 return view('mail.reset')->with(
        ['token' => $token]
    ); 
       
    }

    public function psupdate(Request $request, $token){
       
        $this->validate($request, [
            'password' => 'required|string|min:6',
            'password' => 'required|string|min:6'
        ]);


        $user_password = $request->input('password');
        $user_email = $request->input('email');
        if($token == $user_email){
           
            DB::table('users')
            ->where('email', $user_email)
            ->update(['password' => bcrypt($user_password) ]);

            return redirect('/')->with('success',' password reset successsfully & re-enter your new password ');

        }

        else{
        return redirect("resetfogotton/$token")->with('success',' please enter your E-mail address ');
        }
       
            
    }


    
}

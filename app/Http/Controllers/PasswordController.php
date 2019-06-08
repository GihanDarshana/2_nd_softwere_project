<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Hash;
use Carbon\Carbon;;
use App\User;

class PasswordController extends Controller
{
  
public function showForm(){
    return view('password.show');
}    

public function sendPasswordResetToken(Request $request)
{
    $user = User::where ('email', $request->email)->first();
    if ( !$user ) return redirect()->back()->withErrors(['error' => '404']);

    //create a new token to be sent to the user. 
    DB::table('password_resets')->insert([
        'email' => $request->email,
        'token' => str_random(60), //change 60 to any length you want
        'created_at' => Carbon::now()
    ]);

    $tokenData = DB::table('password_resets')
    ->where('email', $request->email)->first();

   
   $token = $tokenData->token;
  $email = $tokenData->email; // or $email = $tokenData->email;
 
   /**
    * Send email to the email above with a link to your password reset
    * something like url('password-reset/' . $token)
    * Sending email varies according to your Laravel version. Very easy to implement
    */
}

 public function showPasswordResetForm($token)
 {
    print_r($token);
     $tokenData = DB::table('password_resets')
     ->where('token', $token)->first();

    // if ( !$tokenData ) return redirect()->to('/'); //redirect them anywhere you want if the token does not exist.
     return view('passwords.reset');
 }


 public function resetPassword(Request $request, $token)
 {
    

     $password = $request->password;
     $tokenData = DB::table('password_resets')
     ->where('token', $token)->first();

     $user = User::where('email', $tokenData->email)->first();
     if ( !$user ) return redirect()->to('home'); //or wherever you want

     $user->password = Hash::make($password);
     $user->update(); //or $user->save();

     //do we log the user directly or let them login and try their password for the first time ? if yes 
     Auth::login($user);

    
    DB::table('password_resets')->where('email', $user->email)->delete();

    
 }
 
}

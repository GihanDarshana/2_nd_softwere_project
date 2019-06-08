<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class AdminLoginController extends Controller
{
  public function __construct()
   {
   $this->middleware('guest');
   }


    public function showLoginForm(){
        return view('auth.user-login');
    }

   

    public function login(Request $request){
     
      if($request->IsMethod('post')){
          $data = $request->input();
          if(Auth::attempt([ 'email'=>$data['email'], 'password'=>$data['password'], 'type'=>'admin'], $request->remember)){
              
       
           
        

            return redirect('/admin');

          }
         else if(Auth::attempt([ 'email'=>$data['email'], 'password'=>$data['password'], 'type'=>'editor'], $request->remember)){
         
          return redirect('/editor');
                          
        }
          else{
          return redirect('/')->with('flash_message_error',' Invalid Username, Job_Type or password ');
          }
         return redirect()->back()
         ->withInput($request->only($this->username(), 'remember'));

      }
    }

    public function logout(Request $request) {
      $user = Auth::user();
      $user_email = $user->email;
     
      Auth::logout();
      
    return redirect('/');
    }

     
}

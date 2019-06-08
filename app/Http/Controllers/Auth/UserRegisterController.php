<?php
namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class UserRegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegisterForm(Request $request)
    {
        $catergaries=\App\Catergary::all();
        return view('auth.user-register',compact('catergaries'));
       
    }
    
    public function register(Request $request){

        $this->validate($request, [
            'type' => 'required|string|max:1000',
            ]);
    if($request->get('type')=='admin' || $request->get('type')=='editor' ) {   
        
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'contact' => 'required|string|max:10',
            'password' => 'required|string|min:6',
        ]);

       
        $user_name = $request->input('name');
        $user_email = $request->input('email');
        $user_contact = $request->input('contact');
        $user_type = $request->input('type');
        $user_password = $request->input('password');
    
       
      
      $data = array('name' => $user_name, 'email' => $user_email, 'contact' => $user_contact,  'type' => $user_type,  'password' => bcrypt($user_password) );
         
     
            DB::table('users')->insert($data);
            return redirect('UserDetails')>with('success', 'Information has been added');
          

    } 
    else{
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:300',
            'email' => 'required|string|email|max:255',
           'state' => 'required|string|max:20',
            'contact' => 'required|string|max:10',
           'city' => 'required|string|max:20',
            'zipcode' => 'required|string|max:300',
            'password' => 'required|string|min:6',
        ]);

        $user_name = $request->input('name');
        $user_email = $request->input('email');
        $user_city = $request->input('city');
        $user_contact = $request->input('contact');
        $user_type = $request->input('type');
        $user_state = $request->input('state');
        $user_zipcode = $request->input('zipcode');
        $user_password = $request->input('password');
    
       
      
      $data = array('name' => $user_name, 'email' => $user_email, 'state' => $user_state, 'contact' => $user_contact, 'city' => $user_city, 'type' => $user_type, 'zipcode' => $user_zipcode, 'password' => bcrypt($user_password) );
                  
      DB::table('users')->insert($data);
      
           
            return redirect('UserDetails')>with('success', 'Information has been added');
         

    }  
       /**
        $this->validate($req, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'state' => 'required|string|max:20',
            'contact' => 'required|string|max:10',
            'city' => 'required|string|max:20',
            'type' => 'required|string|max:10',
            'zipcode' => 'required|string|max:300',
            'password' => 'required|string|min:6',
        ]);
        
        $user_name = $req->input('name');
        $user_email = $req->input('email');
        $user_city = $req->input('city');
        $user_contact = $req->input('contact');
        $user_type = $req->input('type');
        $user_state = $req->input('state');
        $user_zipcode = $req->input('zipcode');
        $user_password = $req->input('password');
    
       
      
      $data = array('name' => $user_name, 'email' => $user_email, 'state' => $user_state, 'contact' => $user_contact, 'city' => $user_city, 'type' => $user_type, 'zipcode' => $user_zipcode, 'password' => ����= }�w����@��?�����������������ĝ�}�w��߿��� z�P�      < �l��0oo3��x�>���{	$�����������.�H$B��TEQT$  h j� ��y�s�}�҉�=!�4E�Es�� �K����K��.���$ �  F �j�K�$	&i��q�R7�v�{Q�qA
��9�>b
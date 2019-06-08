<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $users=\App\User::all();
        $catergaries=\App\Catergary::all();
        return view('user.index',compact('users'),compact('catergaries'));
    }

    /**
    * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        
        if($req->get('type')=='admin' || $req->get('type')=='editor' ){
             
        
        $this->validate($req, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'contact' => 'required|string|max:10',
           // 'city' => 'required|string|max:20',
            'type' => 'required|string|max:200',
            //'zipcode' => 'required|string|max:300',
            'password' => 'required|string|min:6',
        ]);

       
        $user_name = $req->input('name');
       // $user_address = $req->input('address');
        $user_email = $req->input('email');
        //$user_city = $req->input('city');
        $user_contact = $req->input('contact');
        $user_type = $req->input('type');
       // $user_state = $req->input('state');
        //$user_zipcode = $req->input('zipcode');
        $user_password = $req->input('password');
    
       
      
      $data = array('name' => $user_name, 'email' => $user_email, 'contact' => $user_contact, 'type' => $user_type,  'password' => bcrypt($user_password) );
       
      $data1 = DB::select('select email from users where email=? ', [ $user_email]);
      
        if(count($data1)==0){
      
      DB::table('users')->insert($data);
      return redirect('UserDetails')->with('success', 'Information has been added');
        }
        else{
            return redirect('UserDetails')->with('success', 'duplicate user');   
        } 
         
    }

    else{

        $this->validate($req, [
            'name' => 'required|string|max:255',
            //'address' => 'required|string|max:300',
            'email' => 'required|string|email|max:255',
            'state' => 'required|string|max:20',
            'contact' => 'required|string|max:10',
            'city' => 'required|string|max:20',
            'type' => 'required|string|max:200',
            'zipcode' => 'required|string|max:300',
            'password' => 'required|string|min:6',
        ]);

       
        $user_name = $req->input('name');
        $user_address = $req->input('address');
        $user_email = $req->input('email');
        $user_city = $req->input('city');
        $user_contact = $req->input('contact');
        $user_type = $req->input('type');
        $user_state = $req->input('state');
        $user_zipcode = $req->input('zipcode');
        $user_password = $req->input('password');
    
       
      
      $data = array('name' => $user_name,'email' => $user_email, 'state' => $user_state, 'contact' => $user_contact, 'city' => $user_city, 'type' => $user_type, 'zipcode' => $user_zipcode, 'password' => bcrypt($user_password) );
       
      $data1 = DB::select('select email from users where email=? ', [ $user_email]);
      
        if(count($data1)==0){
      
      DB::table('users')->insert($data);
      return redirect('UserDetails')->with('success', 'Information has been added');
        }
        else{
            return redirect('UserDetails')->with('success', 'duplicate user');   
        }
    }

    }  
    
            

    public function show($id)
    {
        $active = DB::table('users')
            ->where('id', $id)
            ->value('active/deactive');


        if($active=='active'){
            DB::table('users')
            ->where('id', $id)
            ->update(['active/deactive' => 'deactive']);
                   }
       else{
        DB::table('users')
        ->where('id', $id)
        ->update(['active/deactive' => 'active']);
       }
       return redirect('UserDetails');   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \App\User::find($id);
        $catergaries=\App\Catergary::all();
        return view('user.edit',compact('user','id'),compact('catergaries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user= \App\User::find($id);
        if($request->get('type')=='admin' || $request->get('type')=='editor' || $request->get('type')=='technician'){
            $user->name=$request->get('name');
           // $user->address=$request->get('address');
           // $user->state=$request->get('state');
            $user->contact=$request->get('contact');
           // $user->city=$request->get('city');
            $user->type=$request->get('type');
           // $user->zipcode=$request->get('zipcode');
            $user->save();  
        } 
        else{
        $user->name=$request->get('name');
        $user->address=$request->get('address');
        $user->state=$request->get('state');
        $user->contact=$request->get('contact');
        $user->city=$request->get('city');
        $user->type=$request->get('type');
        $user->zipcode=$request->get('zipcode');
        $user->save();
        }
        return redirect('UserDetails');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

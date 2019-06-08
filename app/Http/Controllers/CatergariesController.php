<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;
class CatergariesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        $catergaries=\App\Catergary::all();
        return view('index',compact('catergaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $catergary= new \App\Catergary;
        $user = Auth::user();
        $user_email = $user->email;
        $catergary->catergary_name=$request->get('catergary_name');
        $catergary->catergary_created_by=$user_email;
        $cat_name = $request->input('catergary_name');
        $data = DB::select('select catergary_name from catergaries where catergary_name=? ', [$cat_name]);
       
        if(count($data)==0){
        $catergary->save();
       
        return redirect('catergaries')->with('success', 'Information has been added');
        }

        else{
            return redirect('catergaries')->with('success', 'duplicate catergary');  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
           }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catergary = \App\Catergary::find($id);
        return view('edit',compact('catergary','id'));
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
        $catergary= \App\Catergary::find($id);
        $catergary->catergary_name=$request->get('catergary_name');
        $catergary->save();
        return redirect('catergaries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catergary =\App\Catergary::find($id);
        $catergary->delete();
        return redirect('catergaries')->with('success','Information has been  deleted');
    }

    


}

@extends('layouts.master')

@section('content')
<div class="content-wrapper ScrollStyle vl">
  <!-- Content Header (Page header) -->
  <section class="content-header">
   <br> <h1>
    Dissable users
    </h1>

  </section>

  <!-- Main content -->
  <section class="content">
    
  <div id="content">

<div id="content-header">
  
 
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span5">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
         
        </div>
        <div class="widget-content nopadding">
        
       
        @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
         @endif
         <br>
         @if(Auth::user()->type =='admin') 
          <div class="bg-info text-white p-3">

</div>
@endif
<div class="bg-info text-white p-3">


 </div>
 
   <br>
    <table class="table table-striped">
    <thead>
      <tr>
        <th style="text-align:center">ID</th>
        <th style="text-align:center">Name</th>
        <th style="text-align:center">Email</th>
        <th style="text-align:center">Contact</th>
        <th style="text-align:center">Type</th>
        <th style="text-align:center">Zip Code</th>
         
        <th colspan="2" style="text-align:center">Action</th>
        
      </tr>
    </thead>
    <tbody>
      
      @foreach($users as $user)
     
      <tr>
       @if( $user->states == 'deactive') 
      <td style="text-align:center">{{ $user->id }}</td>
        <td style="text-align:center">{{ $user->name }}</td>
        <td style="text-align:center">{{ $user->email }}</td>
        <td style="text-align:center">{{ $user->contact }}</td>
        <td style="text-align:center">{{ $user->type }}</td>
        <td style="text-align:center">{{ $user->zipcode }}</td>
        <td style="text-align:center"><a href="{{action( 'PassportController@edit', $user->user_id )}}" class="btn btn-success">active</a></td>
        @endif
        
       
       
      
        
      </tr>
      @endforeach
    </tbody>
  </table>
  

          </div>
      </div>
    


  </section>

@endsection

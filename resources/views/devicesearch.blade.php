@extends('layouts.master')

@section('content')
<div class="content-wrapper ScrollStyle vl">
  <!-- Content Header (Page header) -->
  <section class="content-header">
   <br> <h1>
   Search Device
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
    <div class="span6">
     
     @if(isset($details))
        <h6> The Search results for your query <b> {{ $query }} </b> are :</h6>
   <br>
    <table class="table table-striped">
        <thead>
            <tr>
            <th style="text-align:center">ID</th>
        <th style="text-align:center">User_ID</th>
        <th style="text-align:center">Location</th>
        <th style="text-align:center">logititute</th>
        <th style="text-align:center">latitute</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $device)
            <tr>
            @if($device['states'] =='accept')
            <td style="text-align:center">{{$device['id']}}</td>
        <td style="text-align:center">{{$device['user_id']}}</td>
        <td style="text-align:center">{{$device['location']}}</td>
        <td style="text-align:center">{{$device['logitute']}}</td>
        <td style="text-align:center">{{$device['latitute']}}</td>
       @endif
      </tr>
           
            @endforeach
        </tbody>
    </table>
    @endif
</div>
     

 

   
  
        
      </div>
    


  </section>

@endsection

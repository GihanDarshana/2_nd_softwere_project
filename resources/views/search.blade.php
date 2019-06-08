@extends('layouts.master')

@section('content')
<div class="content-wrapper ScrollStyle vl">
  <!-- Content Header (Page header) -->
  <section class="content-header">
   <br> <h1>
  Search catogary
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
                <th style="text-align:center">catogary name</th>
                <th style="text-align:center">created_by</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $user)
            <tr>
                <td style="text-align:center">{{$user->id}}</td>
                <td style="text-align:center">{{$user->catergary_name}}</td>
                <td style="text-align:center">{{$user->catergary_created_by}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
     

 

   
  
        
      </div>
    


  </section>

@endsection

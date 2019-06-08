@extends('layouts.master')

@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" />

<div class="content-wrapper ScrollStyle vl">
  <!-- Content Header (Page header) -->
  <section class="content-header">
   <br> <h1>
    catogary
    </h1>

  </section>

  <!-- Main content -->
  <section class="content">
    
  <div id="content">

<div id="content-header">
@if (\Session::has('success'))
      <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">×</button>
        <p>{{ \Session::get('success') }}</p>
        </div>
         @endif
 
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span5">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
         
        </div>
        <div class="widget-content nopadding">
        
       
       
         <br>
         @if(Auth::user()->type =='admin') 
          <div class="bg-info text-white p-3">
          <button type="submit" name="btn_submit" class="btn btn-danger" data-toggle="modal" data-target="#myModal" tabindex="14"><strong>Add new</strong></button>
          
</div>

<div id="myModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add new catergary</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{url('catergaries')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <label class="control-label">Catagory :</label>
                        <div>
                        <input type="text" class="form-control" name="catergary_name"  />
                        </div>
                    </div>

                     <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success">
                              Submit
                            </button>
                        </div>
                    </div>
                    
                </form>    
               
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




@endif


 

<div class="bg-info text-white p-3">
<form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <input type="search" id="search" name="search" class="form-control" placeholder="Search & Enter">
        </div>
    </div>

</form>

 </div>
 
   <br>
    <table id="datatable" class="table table-striped">
    <thead>
      <tr>
        <th style="text-align:center">ID</th>
        <th style="text-align:center">Name</th>
        <th style="text-align:center">Catergary_add_by</th>
       
      </tr>
    </thead>
    <tbody>
     
     

      @foreach($catergaries as $catergary)
      <tr>
        <td style="text-align:center">{{$catergary['id']}}</td>
        <td style="text-align:center">{{$catergary['catergary_name']}}</td>
        <td style="text-align:center">{{$catergary['catergary_created_by']}}</td>
        
      </tr>
      @endforeach
    </tbody>
  </table>
  
 
          </div>
      </div>


  </section>

@endsection

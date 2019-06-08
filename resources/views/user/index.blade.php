@extends('layouts.master')

@section('content')
<div class="content-wrapper ScrollStyle vl">
  <!-- Content Header (Page header) -->
  <section class="content-header">
   <br> <h1>
    All users
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
          <button type="submit" name="btn_submit" class="btn btn-danger" data-toggle="modal" data-target="#myModal" tabindex="14" onclick="block()"><strong>Add new</strong></button>
          
</div>


<div id="myModal1" class="modal fade" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Online users</h4>
            </div>
            <div class="modal-body">


               <table class="table table-striped">
    <thead>
      <tr>
        <th style="text-align:center">Name</th>
        <th style="text-align:center">Email</th>
          <th style="text-align:center">Type</th>
        </tr>
    </thead>
    <tbody>
            
      @foreach($users as $user)
      
      <tr>
      @if( $user['active/deactive'] == 'online')
        <td style="text-align:center">{{$user['name']}}</td>
        <td style="text-align:center">{{$user['email']}}</td>
       <td style="text-align:center">{{$user['type']}}</td>
       @endif        
               
      </tr>
      @endforeach
    </tbody>
  </table>

               
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<div id="myModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add new user</h4>
            </div>
            <div class="modal-body">
            
           <p> <button class="btn btn-primary" onclick="disable()">Web User</button>   <button class="btn btn-danger" onclick="enable()">System user</button> </p>
             

               <form role="form" method="POST" action="{{url('UserDetails')}}">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">System user:</label>
              <div class="controls">
                <input type="text" class="form-control" name="name" placeholder="Admin/Editor Name" id="name1"/>
                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
              </div>
            </div>
            <div class="control-group">
              <label class="col-form-label">E-mail :</label>
              <div class="controls">
                <input type="email" class="form-control" name="email" placeholder="E-mail" id="email"/>
                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
              </div>
            </div>
            
           <div class="control-group">
              <label class="col-form-label">Address :</label>
              <div class="controls">
                <input type="text" class="form-control" name="address" placeholder="Address" id="address"/>
                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
              </div>
            </div>

            <div class="control-group">
              <label class="col-form-label">State :</label>
              <div class="controls">
                <input type="text" class="form-control" name="state" placeholder="State" id="name"/>
                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
              </div>
            </div>

            
            <div class="control-group">
              <label class="col-form-label">Contact :</label>
              <div class="controls">
                <input type="text" class="form-control" name="contact" placeholder="contact" id="contact"/>
                @if ($errors->has('contact'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                                @endif
              </div>
            </div>

            <div class="control-group">
              <label class="col-form-label">City :</label>
              <div class="controls">
                <input type="text" class="form-control" name="city" placeholder="City" id="city"/>
                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
              </div>
            </div>
          
        
            <div class="control-group">
              <label class="col-form-label">Job Type :</label> 
              <div class="controls">
             <select class="form-control" name="type" id="typeweb" placeholder="job type">
                      <option>admin</option>
                      <option>editor</option>
                      <option>technician</option>
                       </select>
                      </div>
            </div> 

            <div class="control-group">
              <label class="col-form-label">Job Type :</label> 
              <div class="controls">
             <select class="form-control" name="type" id="type" placeholder="job type">
                      @foreach($catergaries as $catergary)
                      <option value="{{ $catergary->catergary_name }}">{{($catergary->catergary_name) }}</option>
                     @endforeach
                      </select>
                      </div>
            </div> 
  
            <div class="control-group">
              <label class="col-form-label">Password input :</label>
              <div class="controls">
                <input type="password"  class="form-control" name="password" placeholder="Enter Password"  id="password"/>
                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
              </div>
            </div>

            <div class="control-group">
              <label class="col-form-label">Zip Code :</label>
              <div class="controls">
                <input type="text" class="form-control" name="zipcode" placeholder="zip code" id="zipcode"/>
                @if ($errors->has('zipcode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zipcode') }}</strong>
                                    </span>
                                @endif
              </div>
            </div>
         <br>
            <div class="form-group">
                        <div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
<form action="/searchuser" method="POST" role="search">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <input type="search" id="search" name="search" class="form-control" placeholder="Search & Enter">
        </div>
    </div>

</form>

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
         
        <th colspan="2" style="text-align:center">Action</th>
       
      </tr>
    </thead>
    <tbody>
            
      @foreach($users as $user)
     
      <tr>
        <td style="text-align:center">{{$user['id']}}</td></h3>
        <td style="text-align:center">{{$user['name']}}</td>
        <td style="text-align:center">{{$user['email']}}</td>
        <td style="text-align:center">{{$user['contact']}}</td>
        <td style="text-align:center">{{$user['type']}}</td>
               
       
        <td><a href="{{action('UserDetailsController@edit', $user['id'])}}" class="btn btn-warning">Edit</a></td>
       
     
        
      </tr>
      @endforeach
    </tbody>
  </table>
  
  
          </div>
      </div>
    
      <script> 
      function disable() { 
        document.getElementById("name").disabled = true; 
        document.getElementById("address").disabled = true;
        document.getElementById("city").disabled = true;
        document.getElementById("zipcode").disabled = true; 
        document.getElementById("typeweb").disabled = false; 
        document.getElementById("type").disabled = true; 
        document.getElementById("name1").disabled = false;
        document.getElementById("contact").disabled = false;
        document.getElementById("email").disabled = false;
        document.getElementById("password").disabled = false;
        }
        
         function enable() { 
           document.getElementById("name").disabled = false;
           document.getElementById("address").disabled = false; 
           document.getElementById("city").disabled = false;
           document.getElementById("zipcode").disabled = false;
           document.getElementById("typeweb").disabled = true;
           document.getElementById("type").disabled = false;
           document.getElementById("name1").disabled = false;
        document.getElementById("contact").disabled = false;
        document.getElementById("email").disabled = false;
        document.getElementById("password").disabled = false;
            } 

             function block() { 
        document.getElementById("name").disabled = true; 
        document.getElementById("address").disabled = true;
        document.getElementById("city").disabled = true;
        document.getElementById("zipcode").disabled = true; 
        document.getElementById("typeweb").disabled = true; 
        document.getElementById("type").disabled = true; 
        document.getElementById("name1").disabled = true;
        document.getElementById("contact").disabled = true;
        document.getElementById("email").disabled = true;
        document.getElementById("password").disabled = true;
               }
            
            </script>



  </section>

@endsection

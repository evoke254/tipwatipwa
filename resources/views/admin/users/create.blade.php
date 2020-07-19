@extends('layouts.app_admin')

@section('content')

<div class="container-fluid">
    <div class="row d-flex justify-content-center">
    	<div class="col-md-8 text-center">
    		<h2>Add or Edit User Details</h2>
    	</div>

    	<div class="col-md-12 text-center">
    		<img src="{{ asset('storage'.$content->pic) }}" class="img-responsive img-fluid rounded z-index-2" style="height: 200px" >
    	</div>
    </div>
    <div class="row d-flex">
    	<div class="col-md">
			@if(\Request::is('*edit'))
			<form method="post" action="/admin/users/{{$content->id}}" enctype="multipart/form-data">
				@method('patch')
			@else
			<form method="post" action="/admin/users" enctype="multipart/form-data">
			@endif
			@csrf

			<div class="row d-flex justify-content-center">
				<div class="col-md-6">
			  	  <div class="form-group">
				    <label for="title">Name</label>
				    <input type="text" class="form-control" id="name" name="name" aria-describedby="Page Name" placeholder="User's Name" value="{{$content->name ?? ''}}" required="">
				  </div>
				</div> <!--
				<div class="col-md-6">
			  	  <div class="form-group">
				    <label for="title">Mobile</label>
				    <input type="text" class="form-control" id="Mobile" name="Mobile" aria-describedby="Page Mobile" placeholder="+2547121234698" value="{{$content->Mobile ?? ''}}">
				  </div>
				</div>
				<div class="col-md-6">
			  	  <div class="form-group">
				    <label for="title">Location</label>
				    <input type="text" class="form-control" id="Location" name="Location" aria-describedby="Page Location" placeholder="Client's address" value="{{$content->Location ?? ''}}">
				  </div>
				</div>
				<div class="col-md-6">
			  	  <div class="form-group">
				    <label for="title">Phone</label>
				    <input type="text" class="form-control" id="Phone" name="Phone" aria-describedby="Page Phone" placeholder="Landline" value="{{$content->Phone ?? ''}}">
				  </div>
				</div>
				<div class="col-md-6">
			  	  <div class="form-group">
				    <label for="title">Address</label>
				    <input type="text" class="form-control" id="Address" name="Address" aria-describedby="Page Phone" placeholder="Landline" value="{{$content->Address ?? ''}}">
				  </div>
				</div> -->
				<div class="col-md-6">
			  	  <div class="form-group">
				    <label for="title">Email</label>
				    <input type="text" class="form-control" id="email" name="email" aria-describedby="Page Email" placeholder="Mail" value="{{$content->email ?? ''}}" required="">
				  </div>
				</div>

				<div class="col-md-6">
			  	  <div class="form-group">
				    <label for="title">Password</label>
				    <input type="text" class="form-control" id="password" name="password" aria-describedby="Page Email" placeholder="Password" value="{{$content->password ?? ''}}" required="">
				  </div>
				</div>
				<div class="col-md-6 my-4">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="pic"
                      aria-describedby="inputGroupFileAddon01" name="pic">
                    <label class="custom-file-label" for="inputGroupFile01">User Image</label>
                  </div>
		   		</div> 
		   		<div class="col-md-6">	   			
		   		  <div class="form-group">
				    <label for="options-about text-danger">*Role</label>
				    <select class="form-control ml-n2" id="role" name="role" required="">
				    	<option disabled="" >Pick User Role</option>
				      <option value="trainer" selected="">Trainer</option>
				      <option value="manager">Manager</option>
				    </select>
				  </div>

		   			
		   		</div>
				<div class="col-md-6">
			  	  <div class="form-group">
				    <label for="title">Description</label>
				    <textarea cols="10" rows="15" class="form-control" id="Description" name="Description" aria-describedby="Description"required="">
				    	{{$content->Description ?? ''}}
				    </textarea>
				  </div>
				</div>

				
		   	</div>
			<div class="row d-flex justify-content-center">
		    	<div class="col-md-3">
		    		<button type="submit" class="btn btn-md btn-success rounded-pill ">
		    			Submit 
		    		</button>
		    	</div>
		    </div>

			</form>	
	    </div>
    </div>
</div>

@endsection

@section('scripts')
    CKEDITOR.replace('content');
@endsection
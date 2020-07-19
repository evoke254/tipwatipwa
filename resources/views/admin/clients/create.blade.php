@extends('layouts.app_admin')

@section('content')

<div class="container-fluid">
    <div class="row d-flex justify-content-center">
    	<div class="col-md-8 text-center">
    		<h2>Add or Edit Client Details</h2>
    	</div>
    </div>
    <div class="row d-flex">
    	<div class="col-md">
			@if(\Request::is('*edit'))
			<form method="post" action="/admin/clients/{{$content->id}}" enctype="multipart/form-data">
				@method('patch')
			@else
			<form method="post" action="/admin/clients" enctype="multipart/form-data">
			@endif
			@csrf

			<div class="row d-flex justify-content-center">
				<div class="col-md-6">
			  	  <div class="form-group">
				    <label for="title">Name</label>
				    <input type="text" class="form-control" id="Name" name="Name" aria-describedby="Page Name" placeholder="Organization Name" value="{{$content->Name ?? ''}}" required="">
				  </div>
				</div>
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
				</div>
				<div class="col-md-6">
			  	  <div class="form-group">
				    <label for="title">Email</label>
				    <input type="text" class="form-control" id="Email" name="Email" aria-describedby="Page Email" placeholder="Mail" value="{{$content->Email ?? ''}}">
				  </div>
				</div>
				<div class="col-md-6">
			  	  <div class="form-group">
				    <label for="title">Description</label>
				    <textarea class="form-control" id="Description" name="Description" aria-describedby="Description" value="{{$content->Description ?? ''}}">
				    </textarea>
				  </div>
				</div>

			  <div class="form-group col-md-6 ">
			    <label for="options-about text-danger">Certification Status</label>
			    <select class="form-control" id="Status" name="Status" required="">
			    	@if(isset($content->Status))
			    	<option value="{{$content->Status ?? ''}}" selected="">{{$content->Status ?? ''}}</option>
			    	@else
					<option value="Certified" selected="">Certified</option>
			    	@endif
					<option value="Decertified">Decertified</option>
			    </select>
			  </div>
				<div class="col-md-6 my-4">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image"
                      aria-describedby="inputGroupFileAddon01" name="image">
                    <label class="custom-file-label" for="inputGroupFile01">Choose Logo Image</label>
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
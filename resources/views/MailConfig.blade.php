@extends('layouts.app_admin')

@section('content')

<div class="container-fluid">
    <div class="row d-flex justify-content-center">
    	<div class="col-md-8">
				<form method="post" action="/admin/1/" enctype="multipart/form-data">
	   				@csrf
	   				<div class="row d-flex justify-content-center">
	   					<div class="col-md-8">     <h6>Mailer In use *SMTP*</h6>
	   					</div>
						  <div class="col-md-8 form-group">
						    <label for="email">Email</label>
						    <input type="Email" class="form-control" id="email" name="email" required="" value="{{env('MAIL_HOST')}}">
						  </div>
						  <div class="col-md-8 form-group">
						    <label for="password">Password</label>
						    <input type="password" class="form-control" id="password" name="password" required="" >
						  </div>
						  <div class="col-md-8 form-group">
						    <label for="host">Server | Host</label>
						    <input type="text" class="form-control" id="host" name="host" required="" value="{{env('MAIL_HOST')}}">
						  </div>
						  <div class="col-md-8 form-group">
						    <label for="port">Mail Port</label>
						    <input type="number" class="form-control" id="port" name="port" value="{{env('MAIL_PORT')}}" required="">
						  </div>
						  <div class="col-md-8 form-group">
						    <label for="encryption">Encryption</label>
						    <input type="text" class="form-control" id="encryption" name="encryption" required="" value="{{env('MAIL_ENCRYPTION')}}">
						  </div>
						  <div class="col-md-12">				  	
								<button type="submit" class="btn btn-success btn-md text-center">Submit</button>
						  </div>
					  </div>	
				</form>
			</div>
		</div>
	</div>

@endsection

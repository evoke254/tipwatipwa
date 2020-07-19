@extends('layouts.app_admin')

@section('content')

<div class="container-fluid">
    <div class="row d-flex justify-content-center">

    	<div class="col-md-12 text-center">
    		<hr class="mb-2">
    		<h3> {{$user->Name}} Details </h3> 
    	</div>
    	<div class="col-md-12 text-center">
    		<img src="{{ asset('storage'.$user->pic) }}" class="img-responsive img-fluid rounded z-index-2" style="height: 250px" >
    	</div>
    </div>
	<div class="row d-flex justify-content-center">
   		<div class="col-md-12">
   			<hr>
   		</div>
		<div class="col-md-5">
			<div class="table-responsive">
				<table class="table table-striped">
					<tr>
						<td> <span class="font-weight-bold">User's Name</span> : <span class="float-right"> {{$user->name}} </span> </td>
					</tr> 
						<td> <span class="font-weight-bold">Email</span> : <span class="float-right"> {{$user->email}} </span> </td>
					</tr>
				</table>
			</div>
		</div>
		<div class="col-md-5">
			<div class="table-responsive">
				<table class="table table-striped">

					<tr>
						<td> <span class="font-weight-bold">Role</span> : <span class="float-right"> {{$user->role}} </span> </td>
					</tr>
					<tr>
						<td> <span class="font-weight-bold">Description</span> : <span class="float-right"> {{$user->Description}} </span> </td>
					</tr>
				</table>
			</div>
   		</div>
   		<div class="col-md-12">
   			<hr>
   		</div>
   		<div class="col-md-2 text-center">
   			<a href="/admin/users/{{$user->id}}/edit" class="btn btn-md btn-warning rounded-pill">Edit <i class="fa fa-cogs ml-3" aria-hidden="true"></i></a>
   		</div>
   		<div class="col-md-2 text-center">
   			<form action="/admin/users/{{$user->id}}" method="post" >
              @csrf @method('delete')
              <button type="submit" class="btn btn-danger px-2 btn-md rounded-pill"> Delete <i class="fas fa-trash ml-3" aria-hidden="true"></i></button>
            </form>
   		</div>
</div>

@endsection

@section('scripts')
    CKEDITOR.replace('content');
@endsection
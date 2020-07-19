@extends('layouts.app_admin')

@section('content')

<div class="container-fluid">
    <div class="row d-flex">
    	<div class="col-md">
			@if(\Request::is('*edit'))
			<form method="post" action="/admin/forms/{{$content->id}}" enctype="multipart/form-data">
				@method('patch')
			@else
			<form method="post" action="/admin/forms" enctype="multipart/form-data">
			@endif
			@csrf

			<div class="row d-flex justify-content-center">
				<div class="col-md-6">
			  	  <div class="form-group">
				    <label for="title">Title</label>
				    <input type="text" class="form-control" id="title" name="title" aria-describedby="Page title" placeholder="Document Title" value="{{$content->description ?? ''}}">
				  </div>
				</div>

				<div class="col-md-6">
			  	  <div class="form-group">
				    <label for="title">Description</label>
				    <textarea class="form-control" id="description" name="description" aria-describedby="Description" value="{{$content->description ?? ''}}">
				    </textarea>
				  </div>
				</div>
		   		<div class="col-md-6">
		   			
		   			
		   		</div>
		   		<div class="col-md-6">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="file"
                      aria-describedby="inputGroupFileAddon01" name="file">
                    <label class="custom-file-label" for="inputGroupFile01">Choose Doc</label>
                  </div>
					<button type="submit" class="btn btn-success btn-md text-center">Upload</button>
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
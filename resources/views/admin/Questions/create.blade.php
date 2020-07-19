@extends('layouts.app_admin')

@section('content')
<div class="container-fluid">
    <div class="row d-flex">
    	<div class="col-md">
			@if(\Request::is('*edit'))
			<form method="post" action="/admin/questions/{{$content->id}}" enctype="multipart/form-data">
				@method('patch')
			@else
			<form method="post" action="/admin/questions" enctype="multipart/form-data">
			@endif
			@csrf

			<div class="row d-flex justify-content-center">
				
				<div class="col-md-6">
			  	  <div class="form-group">
				    <label for="title">Question</label>
				    <textarea class="form-control" id="question" name="question" aria-describedby="question" value="{{$content->question ?? ''}}" required="">{{$content->question ?? ''}}
				    </textarea>
				  </div>
				</div>

				<div class="col-md-6">
			  	  <div class="form-group">
				    <label for="title">Answer</label>
				    <textarea class="form-control" id="answer" name="answer" aria-describedby="answer" value="{{$content->answer ?? ''}}" required=""> {{$content->answer ?? ''}}
				    </textarea>
				  </div>
				</div>

		   		<div class="col-md my-5">
					<button type="submit" class="btn btn-success btn-md text-center">Create | Update</button>
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
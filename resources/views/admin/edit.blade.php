
@extends('layouts.app_admin')
@section('content')
		<div class="content">
			<div class="row d-flex justify-content-center">
	          <div class="col-md-12 text-center">
	            <h4>Add {{$requestparams['moduleName']}} </h4>
	          </div>
	        </div>
	        <div class="row d-flex justify-content-center">
	          <div class="col">
	          <img class="img-fluid img-responsive rounded" style="height: 350px" src="{{asset('storage'.$requestparams['moduleData']['image'])}}">
	          </div>
	        </div>
		</div>
    <editmodule :requestparams="{{ json_encode($requestparams) }}" :csrf="{{ json_encode(csrf_token()) }}" ></editmodule>
@endsection
@section('scripts')
	$('.datepicker').datepicker({
		format: 'yyyy/mm/dd',
		startDate: '+0d'
	});

	$('.custom-file-input').change(function(e){
            var fileName = e.target.files[0].name;
            $("#custom-file-label").html(fileName);
    });

@endsection




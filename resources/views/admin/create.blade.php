
@extends('layouts.app_admin')
@section('content')


    <createmodule :requestparams="{{ json_encode($requestparams) }}" :csrf="{{ json_encode(csrf_token()) }}" ></createmodule>
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




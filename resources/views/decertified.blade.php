@extends('layouts.app-other')

@section('content')

<section class="wow fadeIn">

	<div class="row d-flex justify-content-center rounded" style=" height: 16vh">			
	</div>
	<div class="container mt-4">
		<div class="row d-flex justify-content-center mt-5">
			<div class="col-md-12 text-center my-2">
				<h4 class="font-weight-bold">Decertified Companies</h4>
			</div>
		</div>

		<div class="row d-flex justify-content-center my-5">
			@if($content->count() < 1)
				<p class="green-text">All our members are duly certified.</p>
			@endif
			@foreach($content as $client)
              <div class="col-md-3 my-5">          
				<div class="card border-light mb-3">
				  	<div class="d-flex align-items-center justify-content-center" >
				  		<img style="width: 100px !important; background-color: #ffffff" @if(!empty($client->image)) src=" {{asset('storage'.$client->image)}}" @else src="{{asset('storage/images/sample-client-logo.png')}}" @endif  class=" mt-n4 img-fluid rounded border border-success p-2">
				  	</div>

				  <div class="p-3 d-flex align-items-center justify-content-center">
				  <h5 class="card-title">{{$client->Name}}</h5> </div>
				  <hr class="mt-n2">
				  <div class="card-body">
				    <p class="card-text mt-n4"><span class="font-weight-bold">Location</span> : {{$client->Location}} </p>
				    <hr class="my-1">
				    <p class="card-text"><span class="font-weight-bold">Address</span> : {{$client->Address}}</p>
				     <hr class="my-1">
				    <p class="card-text"><span class="font-weight-bold">Mobile</span> : {{$client->Mobile}}</p>
				  </div>
				</div>
              </div>
            @endforeach
		</div>
	</div>
</section>
@include('partials.footer')

@endsection

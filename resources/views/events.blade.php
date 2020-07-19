
@extends('layouts.app-home')

@include('partials.topnav')
@section('content')


<div class="container">
	<div class="row d-flex justify-content-center animation wow fadeIn my-3">
		<div class="row d-flex justify-content-center align-items-center">
			@foreach($events as $event)
			<div class="col-md-4 my-2">
				<div class="card mask rgba-black-strong z-depth-2">
				  <div class="view rounded">
				    <a href="#">
				    	<img class="card-img-top" alt="Community" src="{{ asset('storage/images/events-poster.jpg') }}">
					    <div class="mask rgba-black-strong">
					    	<div class="row d-flex justify-content-start">
					    		<div class="col-md-auto p-3 ml-3">
									<h4 class="text-white font-weight-bold my-1">{{date('j', strtotime($event->start))}}</h4>
									<p>{{date('M', strtotime($event->start))}}</p>
					    		</div>
					    	</div>
					    	<div class="row my-1 d-flex align-items-end text-light">
					      		<div class="ml-3 p-3">
					      		<h4 class="font-weight-bold">{!! $event->title !!}</h4>	
								  {!! $event->desc !!}
					      		</div>
					    	</div>
					    </div>
				    </a>
				  </div>
				</div>
			</div>
			@endforeach


		

		</div>
	</div>
</div>




@include('partials.footer')

@endsection



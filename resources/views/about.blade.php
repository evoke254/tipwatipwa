
@extends('layouts.app-home')

@include('partials.topnav')
@section('content')

<section class="animated slower wow fadeInUp" style=" background-color: {{env('KHAKI')}}">
  <div class="container-fluid py-3 mt-5">
    <div class="row d-flex justify-content-center align-items-center">

    	<div class="col-md-4 my-4">
    		<div class="card">
			  <div class="view overlay">
			    <img class="card-img-top" style="height: 300px; object-fit: cover;" src="{{ asset('storage/images/fit-all.jpg') }}" alt="Swift Apps Africa">
			    <a href="{{route('fitness_for_all')}}">
			      <div class="mask rgba-white-slight"></div>
			    </a>
			  </div>
			  <div class="card-body">
			    <h4 class="card-title text-center short-border">Fitness For All Events</h4>
			  </div>
			</div>
    	</div>

    	<div class="col-md-4 my-4">
    		<div class="card">
			  <div class="view overlay">
			    <img class="card-img-top" style="height: 300px; object-fit: cover;" src="{{ asset('storage/images/hikers.jpg') }}" alt="Swift Apps Africa">
			    <a href="{{route('explore_and_discover')}}">
			      <div class="mask rgba-white-slight"></div>
			    </a>
			  </div>
			  <div class="card-body">
			    <h4 class="card-title text-center short-border">Explore & Discover Events</h4>
			  </div>
			</div>
    	</div>

    	<div class="col-md-4 my-4">
    		<div class="card">
			  <div class="view overlay">
			    <img class="card-img-top" style="height: 300px; object-fit: cover;" src="{{ asset('storage/images/Teambldg1.jpg') }}" alt="Swift Apps Africa">
			    <a href="{{route('motivate_and_train')}}">
			      <div class="mask rgba-white-slight"></div>
			    </a>
			  </div>
			  <div class="card-body">
			    <h4 class="card-title text-center short-border">Motivate and Train Events</h4>
			  </div>
			</div>
    	</div>


    </div>
  </div>
</section>



<section class="animated slower wow fadeInUp"  style=" background-color: {{env('KHAKI')}}">
  <div class="container-fluid">
        <div class="row align-items-center">
        		<div class="col text-center my-3 py-4 align-self-center">
	        		<p class="text-white font-weight-bold" style="font-size: 2em !important">your time is important and our full annual calendar will help you keep track and plan for your events.</p>
	        	</div>
        </div>
  </div>
</section>

<section class="animated slower wow fadeInUp">
  <div class="container-fluid">
        <div class="row align-items-center">
        		<div class="col text-center my-3 py-4 align-self-center">
	        		<p class="font-weight-bold" style="font-size: 2em !important;"> Events & Experiences</p>
	        	</div>
        </div>
  </div>
</section>

@include('partials.footer')

@endsection



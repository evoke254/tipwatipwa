
@extends('layouts.app-home')

@include('partials.topnav')
@section('content')

<section class="animated slower wow fadeInUp" style=" background-color: {{env('KHAKI')}}">
  <div class="container-fluid py-3 mt-5">
    <div class="row d-flex justify-content-center align-items-center">
		<div class="col-md-12 my-4">
    		<h2 class="text-center white-text">
    			TT Fitness For All Events.
    		</h2>
    	</div>
    	<!--
    	<div class="col-md-4 my-4">
    		<div class="card">
			  <div class="view overlay">
			    <img class="card-img-top" style="height: 300px; object-fit: cover;" src="{{ asset('storage/images/running-tt.jpg') }}" alt="Swift Apps Africa">
			    <a href="#!">
			      <div class="mask rgba-white-slight"></div>
			    </a>
			  </div>
			  <div class="card-body">
			    <h4 class="card-title text-center short-border">Local and global races</h4>
			  </div>
			</div>
    	</div>
    	<div class="col-md-4 my-4">
    		<div class="card">
			  <div class="view overlay">
			    <img class="card-img-top" style="height: 300px; object-fit: cover;" src="{{ asset('storage/images/bootcamp.png') }}" alt="Swift Apps Africa">
			    <a href="#!">
			      <div class="mask rgba-white-slight"></div>
			    </a>
			  </div>
			  <div class="card-body">
			    <h4 class="card-title text-center short-border"> Boot Camps</h4>
			  </div>
			</div>
    	</div>
-->


    	<div class="col my-4">
    		<div class="card">
			  <div class="view overlay">
			    <img class="card-img-top" style="height: 450px; object-fit: cover;" src="{{ asset('storage/images/woman-abs-workout-dumbbell.jpg') }}" alt="Swift Apps Africa">
			    <a href="#!">
			      <div class="mask rgba-white-slight"></div>
			    </a>
			  </div>
			  <div class="card-body">
			    <h4 class="card-title text-center short-border">Virtual Fitness Sessions</h4>
			  </div>
			</div>
    	</div>

    
    	<div class="col my-4">
    		<div class="card">
			  <div class="view overlay">
			    <img class="card-img-top" style="height: 450px; object-fit: cover;" src="{{ asset('storage/images/eliudkipchoge.jpg') }}" alt="Swift Apps Africa">
			    <a href="#!">
			      <div class="mask rgba-white-slight"></div>
			    </a>
			  </div>
			  <div class="card-body">
			    <h4 class="card-title text-center short-border">Race Calendar</h4>
			  </div>
			</div>
    	</div>
    </div> 
  </div>
</section>

@include('partials.footer')

@endsection



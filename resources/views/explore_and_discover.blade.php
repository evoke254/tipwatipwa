
@extends('layouts.app-home')

@include('partials.topnav')
@section('content')

<section class="animated slower wow fadeInUp" style=" background-color: {{env('KHAKI')}}">
  <div class="container-fluid py-3 mt-5">
    <div class="row d-flex justify-content-center align-items-center">
    	<div class="col-md-12 my-4">
    		<h2 class="text-center white-text">
    			TT Explore & Discover Events.
    		</h2>
    	</div>
		<!--
    	<div class="col-md-4 my-4">
    		<div class="card">
			  <div class="view overlay">
			    <img class="card-img-top" style="height: 300px; object-fit: cover;" src="{{ asset('storage/images/woman-abs-workout-dumbbell.jpg') }}" alt="Swift Apps Africa">
			    <a href="#!">
			      <div class="mask rgba-white-slight"></div>
			    </a>
			  </div>
			  <div class="card-body">
			    <h4 class="card-title text-center short-border">Virtual Fitness Sessions</h4>
			  </div>
			</div>
    	</div> -->

    	<div class="col-md-4 my-4">
    		<div class="card">
			  <div class="view overlay">
			    <img class="card-img-top" style="height: 300px; object-fit: cover;" src="{{ asset('storage/images/hikers.jpg') }}" alt="Swift Apps Africa">
			    <a href="#!">
			      <div class="mask rgba-white-slight"></div>
			    </a>
			  </div>
			  <div class="card-body">
			    <h4 class="card-title text-center short-border">Hikes</h4>
			  </div>
			</div>
    	</div>

    	<div class="col-md-4 my-4">
    		<div class="card">
			  <div class="view overlay">
			    <img class="card-img-top" style="height: 300px; object-fit: cover;" src="{{ asset('storage/images/summit.jpg') }}" alt="Swift Apps Africa">
			    <a href="#!">
			      <div class="mask rgba-white-slight"></div>
			    </a>
			  </div>
			  <div class="card-body">
			    <h4 class="card-title text-center short-border">Mountain Expeditions 2020/21 Season</h4>
			  </div>
			</div>
    	</div>

    	<div class="col-md-4 my-4">
    		<div class="card">
			  <div class="view overlay">
			    <img class="card-img-top" style="height: 300px; object-fit: cover;" src="{{ asset('storage/images/adventure_sport.jpg') }}" alt="Swift Apps Africa">
			    <a href="#!">
			      <div class="mask rgba-white-slight"></div>
			    </a>
			  </div>
			  <div class="card-body">
			    <h4 class="card-title text-center short-border">Adventure Sports</h4>
			  </div>
			</div>
    	</div>

    	

    </div> 
  </div>
</section>

@include('partials.footer')

@endsection



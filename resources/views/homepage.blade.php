@extends('layouts.app-home')

@include('partials.topnav')
@section('content')

<section class="animated slower wow fadeInUp">
  <div class="container-fluid py-3">
    <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
		<div class="col text-center">
		    <img class="img-responsive" style="" src="{{ asset('images/logo.jpg') }}">
    		<h4 class="font-weight-bold text-center text-white align-middle" style="font-size: 2em !important; color: {{env('LIME')}} !important">
    			Set your goals and demolish them
    		</h4>
    	</div>
    </div> 
  </div>
</section>

<section class="animated slower wow fadeInUp"  style=" background-color: {{env('BROWN')}}">
  <div class="container-fluid py-3">
        <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
        		<div class="col text-center" style="display: inline;">
	        		<h4 class="font-weight-bold text-center text-white align-middle" style="font-size: 8em !important">
	        			Holistic
	        		</h4>
	        		<p class="text-white font-weight-bold" style="font-size: 4em !important">Mind . Body . Community</p>
	        	</div>
        </div> 
  </div>
</section>


<section class="animated slower wow fadeInUp"  style="height: 100vh; background-color: {{env('LIME')}}">
  <div class="container-fluid py-3">
        <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
        		<div class="col-8 text-center">
	        		<h4 class="font-weight-bold text-center text-white" style="font-size: 8em !important">
	        			Lifestyle
	        		</h4>
	        		<p class="text-white font-weight-bold" style="font-size: 4em !important">Nutrition . Movement . Activity</p>
	        	</div>
        </div> 
  </div>
</section>

<section class="animated slower wow fadeInUp"  style="height: 100vh; background-color: {{env('KHAKI')}}">
  <div class="container-fluid py-3">
        <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
        		<div class="col-8 text-center">
	        		<h4 class="font-weight-bold text-center text-white" style="font-size: 8em !important">
	        			Functional
	        		</h4>
	        		<p class="text-white font-weight-bold" style="font-size: 4em !important">Purpose . Aligned . Useful</p>
	        	</div>
        </div> 
  </div>
</section>


<!-- Fitness for all -->
<section class="animated slower wow fadeInUp" style=" background-image: url({{ asset('storage/images/fit-all.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: top;">
  <div class="container-fluid mask rgba-black-light py-3" style="opacity: 0.9; height: 100vh">
        <div class="row d-flex justify-content-center">
        		<div class="col-md-11 my-4 text-center">
	        		<h4 class="short-border font-weight-bold text-center text-white" style="font-size: 8em"> Fitness For All
	        		</h4>
	        	</div>
        </div>

  </div>
</section>

<section class="animated slower wow fadeInUp"  style="height: 18vh; background-color: {{env('LIME')}}">
  <div class="container-fluid">
        <div class="row align-items-center">
        		<div class="col text-center my-3 py-4 align-self-center">
	        		<p class="text-white font-weight-bold" style="font-size: 2em !important">Fitness for all ages, male and female, athletes and beginners.</p>
	        	</div>
        </div> 
  </div>
</section>

<section class="animated slower wow fadeInUp"  style="height: 18vh">
  <div class="container-fluid">
        <div class="row align-items-center">
        		<div class="col text-center my-3 py-4 align-self-center">
	        		<p class="font-weight-bold" style="font-size: 2em !important; color: {{env('KHAKI')}} !important">Start and stay fit with Tipwatipwa.</p>
	        	</div>
        </div> 
  </div>
</section>
<!-- End Fitness for all -->


<!-- Explore n Discover -->
<section class="animated slower wow fadeInUp" style=" background-image: url({{ asset('storage/images/hikers.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: top;">
  <div class="container-fluid mask rgba-black-light py-3" style="opacity: 0.9; height: 100vh">
        <div class="row d-flex justify-content-center">
        		<div class="col-md-11 my-4 text-center">
	        		<h4 class="short-border font-weight-bold text-center text-white" style="font-size: 8em"> Explore & Discover
	        		</h4>
	        	</div>
        </div>

  </div>
</section>

<section class="animated slower wow fadeInUp"  style="height: 18vh; background-color: {{env('LIME')}}">
  <div class="container-fluid">
        <div class="row align-items-center">
        		<div class="col text-center my-3 py-4 align-self-center">
	        		<p class="text-white font-weight-bold" style="font-size: 2em !important">Hike forest and open trails, craters and hills, or go for a full mountaiin expedition.</p>
	        	</div>
        </div> 
  </div>
</section>

<section class="animated slower wow fadeInUp"  style="height: 18vh">
  <div class="container-fluid">
        <div class="row align-items-center">
        		<div class="col text-center my-3 py-4 align-self-center">
	        		<p class="font-weight-bold" style="font-size: 2em !important; color: {{env('KHAKI')}} !important">Hike and climb with Tipwatipwa.</p>
	        	</div>
        </div> 
  </div>
</section>
<!-- End Explore n Discover -->



<!-- Motivate n Train -->
<section class="animated slower wow fadeInUp" style=" background-image: url({{ asset('storage/images/Teambldg1.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: top;">
  <div class="container-fluid mask rgba-black-light py-3" style="opacity: 0.9; height: 100vh">
        <div class="row d-flex justify-content-center">
        		<div class="col-md-11 my-4 text-center">
	        		<h4 class="short-border font-weight-bold text-center text-white" style="font-size: 8em"> Motivate & Train
	        		</h4>
	        	</div>
        </div>

  </div>
</section>

<section class="animated slower wow fadeInUp"  style="height: 18vh; background-color: {{env('LIME')}}">
  <div class="container-fluid">
        <div class="row align-items-center">
        		<div class="col text-center my-3 py-4 align-self-center">
	        		<p class="text-white font-weight-bold" style="font-size: 2em !important">Try sports and fitness experiential for all groups; family, chama or workplace.</p>
	        	</div>
        </div> 
  </div>
</section>

<section class="animated slower wow fadeInUp"  style="height: 18vh">
  <div class="container-fluid">
        <div class="row align-items-center">
        		<div class="col text-center my-3 py-4 align-self-center">
	        		<p class="font-weight-bold" style="font-size: 2em !important; color: {{env('KHAKI')}} !important">Engage your community with Tipwatipwa.</p>
	        	</div>
        </div> 
  </div>
</section>
<!-- End Motivate n Train -->



@include('partials.footer')

@endsection








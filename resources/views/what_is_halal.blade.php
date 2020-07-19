
@extends('layouts.app-home')
@section('content')
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel" style="height: auto !important;">
  <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <div class="view rounded" style="background-image: url({{ asset('images/more/audit02_c.JPG') }}), linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(191,189,189,1) 30%, rgba(89,89,89,1) 100%); background-size: cover; background-repeat: no-repeat; background-position: center; height: 350px; max-height: 350px !important" >
            <div class="mask rgba-black-light"></div>
          </div>
          <div class="carousel-caption mt-n5">
            <h1 class="h3-responsive font-weight-bold">KBHC - What is Halal?</h1>
          </div>
        </div>
    </div>
</div>

<div class="container-fluid my-5">
    <div class="row d-flex justify-content-center align-items-center">     
		<div class="col-md-8 text-center">
			<h4 class="short-border my-3 mb-5">What is Halal?</h4>
		</div>
	</div>
	<div class="row d-flex justify-content-center">
		<div class="col-md-8">
				{!!$content->content!!}
		</div>
	</div>
</div>
@include('partials.footer')
@endsection

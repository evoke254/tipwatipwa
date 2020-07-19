@extends('layouts.app-home')
@section('content')

<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel" style="height: auto !important; ">
  <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <div class="view rounded" style="background-image: url({{ asset('images/more/audit06_c.JPG') }}), linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(191,189,189,1) 30%, rgba(89,89,89,1) 100%); background-size: cover; background-repeat: no-repeat; background-position: top; height: 300px; max-height: 300px !important" >
            <div class="mask rgba-black-light"></div>
          </div>
          <div class="carousel-caption mt-n5">
            <h1 class="h3-responsive font-weight-bold">Benefits of Halal Certification: (KBHC)</h1>
          </div>
        </div>
    </div>
</div>
<div class="container" >
	<div class="row my-3 d-flex justify-content-center align-items-center">
	    <div class="col-md-8 mx-2 my-5">
	          <h3 class="font-weight-bold text-success text-center">What is Halal Certification ?</h3>
	    </div>
	    <div class="col-md-8">

        <img class="img-responsive img-fluid mb-3" style="border-radius: 2em; border-bottom-right-radius: 40em 10em; border-top-right-radius: 40em 10em; " src="{{ asset('images/board2.jpg') }}">
				{!!$content->content!!}
	    </div>
	</div>
</div>

@include('partials.footer')

@endsection

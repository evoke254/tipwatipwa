@extends('layouts.app-other')

@section('content')

<section class="wow fadeIn">

	<div class="row d-flex justify-content-center rounded" style=" height: 10vh;">			
	</div>
	<div class="container mt-4">
		<div class="row d-flex justify-content-center mb-3">
			<div class="col-md-12 text-center">
				<h4>Halal Bulletins</h4>
			</div>
		</div>
		<div class="row d-flex justify-content-center my-5">
    		@if ($content !=null )
          @foreach($content as $bulletin)
              <div class="col-md-4 mx-3 my-5">
                <div class="card z-depth-2 border border-success">
                  <div class="view overlay">
                    <img class="card-img-top img-responsive img-fluid" src="{{asset('storage'.$bulletin->thumbnail)}}"
                      alt="KBHC">
                    <a href="/download/bulletin/{{$bulletin->id}}" target="_blank">
                      <div class="mask rgba-white-slight"></div>
                    </a>
                  </div>
                  <div class="card-body">
                    <h5 class="short-border font-weight-bold text-center text-success">{{$bulletin->title}}</h5> <br>
                  </div>
                  <div class="card-footer text-center">
                    <a href="/download/bulletin/{{$bulletin->id}}" target="_blank" class="btn btn-success btn-outline-success btn-md font-weight-bold"> View | Download</a>
                  </div>
                </div>
              </div>
            @endforeach
          @endif
		</div>
	</div>
</section>
@include('partials.footer')

@endsection

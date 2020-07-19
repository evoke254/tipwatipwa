@extends('layouts.app-other')

@section('content')
<div style="height: 16vh">
	
</div>
	<div class="animated wow fadeInUp container mt-4" style=" margin-top: 90px;">
		<div class="row d-flex justify-content-center">
			<div class="col-md-12 text-center">
				<h4>Application Forms</h4>
			</div>
		</div>
		<div class="row d-flex justify-content-center">
			<div class="col-md-8">
				<p>Please download the appropriate application form below, complete and return to:</p>
				<p> <span class="font-weight-bold">Kenya Bureau of Halal Certification</span> <br>
					Village plaza, Ngara Rd, Block A, Suite A2, <br>
					P.O. Box 39445-00623 Nairobi , Kenya</p>
			</div>
		</div>
		<div class="row d-flex justify-content-center my-5">
			@if ($content !=null )
			@foreach($content as $form)
              <div class="col-md-4 mx-3 my-5">
                <div class="card z-depth-2 border border-success">
				  <div class="view overlay">
				    <img class="card-img-top img-responsive img-fluid" src="{{asset('storage'.$form->thumbnail)}}"
				      alt="KBHC">
				    <a href="/download/form/{{$form->id}}" target="_blank">
				      <div class="mask rgba-white-slight"></div>
				    </a>
				  </div>
                  <div class="card-body">
                    <h5 class="short-border font-weight-bold text-center text-success">{{$form->title}}</h5> <br>
                  </div>
                  <div class="card-footer text-center">
                  	<a href="/download/form/{{$form->id}}" target="_blank" class="btn btn-success btn-outline-success btn-md font-weight-bold"> View | Download</a>
                  </div>
                </div>
              </div>
            @endforeach
            @endif
		</div>
	</div>
@include('partials.footer')

@endsection


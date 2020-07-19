@extends('layouts.app_admin')

@section('content')




<div class="container mt-4" data-animation="true" data-animation-type="fadeInUp">
		<div class="row d-flex justify-content-center">
			<div class="col-md-12 col-lg-12 col-sm-12 text-center">
				<h4 class="deep-orange-text">Add Event to Calendar</p>
			</div>
		</div>
		<form class="validate-form" action="/admin/event" method="POST">
			@csrf
			<ul class="stepper linear horizontal">
			   <li class="step active">
			      <div class="step-title waves-effect">Select Category</div>
			      <div class="step-content">
                    <div class="form-group row">
                      <div class="col-md-12">
                          <select name="category" id="category" class="form-control">
                              <option value="0" selected="selected" disabled>Event Category</option>
                              <option value="Fit">Fitness For All</option>
                              <option value="Explore">Explore & Discover</option>
                              <option value="Train">Train & Motivate</option>
                          </select>
                      </div>
                    </div>
			         <div class="step-actions">
			            <!-- Here goes your actions buttons -->
			            <button class="waves-effect waves-dark btn next-step">CONTINUE</button>
			         </div>
			      </div>
			   </li>
			</ul>
		  </form>
</div>


@endsection

@section('scripts')

	var stepper = document.querySelector('.stepper');
   	var stepperInstace = new MStepper(stepper, {
      // options
      firstActive: 0 // this is the default
   	})

@endsection







@extends('layouts.app-home')
@section('content')
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel" style="height: auto !important">
  <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <div class="view rounded" style="background-image: url({{ asset('images/more/comp_app.jpg') }}), linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(191,189,189,1) 30%, rgba(89,89,89,1) 100%); background-size: cover; background-repeat: no-repeat; background-position: top; height: 350px; max-height: 350px !important" >
            <div class="mask rgba-black-light"></div>
          </div>
          <div class="carousel-caption mt-n5">
            <h1 class="h3-responsive font-weight-bold">Complaints and Appeals Kenya Bureau of Halal Certification (KBHC)</h1>
          </div>
        </div>
    </div>
</div>

<div class="container-fluid my-5">
    <div class="row d-flex justify-content-center align-items-center">     
        <div class="col-md-6">
          <h3 class="text-center font-weight-bold text-success">Complaints and Appeals </h3>
          <p>Dear Clients,</p>
          <p>For any complaints and appeals, please fill the textbox below. All requests received shall be forwarded to the Complaints Committee for further action.</p>
        </div>
      </div>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6">
             <form class="form-horizontal" method="POST" action="/complaints_appeals">
              @csrf

              <div class="form-group my-3">
                <label>
                  Message <span class="red-text">*</span></label>
                <div class="col-md-9">
                  <textarea class="form-control border border-success" rows="5" name="body" required=""></textarea>
                </div>
              </div>
              <div class="form-group my-3">
                <label>
                </label>
                <div class="col-md-9 text-center">
                <button class="btn btn-success btn-outline-success btn-md">
                  <i class="fa fa-paper-plane" aria-hidden="true"></i> Send </button>
                </div>
              </div>
            </form>
        </div>
    </div>
    </div>
    </div>
@include('partials.footer')
<!--

</div> -->
@endsection

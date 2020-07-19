
@extends('layouts.app-home')

@include('partials.topnav')
@section('content')
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel" style="height: auto !important">
  <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <div class="view rounded swift-polygon" style="background-image: url({{ asset('storage/images/coll.jpg') }}), linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(191,189,189,1) 30%, rgba(89,89,89,1) 100%); background-size: cover; background-repeat: no-repeat; background-position: center; height: 450px; max-height: 450px !important" >
            <div class="mask rgba-black-light"></div>
          </div>
        </div>
    </div>
</div>

<div class="container-fluid my-5">
    <div class="row d-flex justify-content-center align-items-center">     
        <div class="col-md-6">
          <h3 class="text-center font-weight-bold text-muted">Get in Touch with {!! env('APP_NAME')!!} </h3>
          <p>Do you have a question for us or important information you would like to share? Just fill the form and hit send. We will get back to you as soon as we can.</p>
        </div>
      </div>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6">
             <form class="form-horizontal" method="POST" action="/mails">
              @csrf
              <div class="form-group my-3">
                <label>
                  Name <span class="red-text">*</span></label>
                <div class="col-md-9">
                  <input type="text" class="form-control border border-success" name="name" required="" />
                </div>
              </div>
              <div class="form-group my-3">
                <label>
                  Email <span class="red-text">*</span></label>
                <div class="col-md-9">
                  <input type="email" class="form-control border border-success" name="email" required="" />
                </div>
              </div>
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
                  <i class="fa fa-paper-plane" aria-hidden="true"></i> Send Mail </button>
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

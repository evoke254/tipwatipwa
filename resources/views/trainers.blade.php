
@extends('layouts.app-home')
@include('partials.topnav')
@section('content')

<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel" style="height: auto !important; ">
  <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <div class="view rounded swift-polygon" style="background-image: url({{ asset('storage/images/Tipwa_Tipwa006.JPG') }}), linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(191,189,189,1) 30%, rgba(89,89,89,1) 100%); background-size: cover; background-repeat: no-repeat; background-position: center; height: 450px; max-height: 450px !important" >
            <div class="mask rgba-black-light"></div>
          </div>
        </div>
    </div>
</div>

<div class="row my-3">
    <div class="col-md">
          <h3 class="font-weight-bold my-4 text-muted text-center">{{env('APP_NAME')}}</h3>
    </div>
</div>


<div class="container">
  <section class="dark-grey-text">
    <div class="row d-flex justify-content-center align-items-center">
        @php $count = 0 @endphp
        @foreach($trainers as $trainer)
        @php $count++  @endphp
        <div class="col-md-6">
          <img class="z-depth-2 rounded img-responsive rounded swift-trainer-img border border-success" style="max-height: 650px" src="{{asset('storage'.$trainer->pic)}}">
        </div>
        <div class="col-md-6 my-2">
          {{$trainer->Description}}
        </div>
        @endforeach

    </div>
  </section>
</div>


@include('partials.footer')


@endsection

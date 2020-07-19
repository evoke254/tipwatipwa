
@extends('layouts.app-home')
@include('partials.topnav')
@section('content')

<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel" style="height: auto !important; ">
  <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <div class="view rounded swift-polygon" style="background-image: url({{ asset('storage/images/qstns-pic.jpg') }}), linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(191,189,189,1) 30%, rgba(89,89,89,1) 100%); background-size: cover; background-repeat: no-repeat; background-position: center; height: 500px; max-height: 500px !important" >
            <div class="mask rgba-black-light"></div>
          </div>
        </div>
    </div>
</div>

<div class="row my-3">
    <div class="col-md">
          <h3 class="font-weight-bold my-4 text-muted text-center">Frequently Asked Questions (FAQs)</h3>
    </div>
</div>


<div class="container rounded my-2">
  <section class="dark-grey-text">
    <div class="row pr-lg-5 d-flex justify-content-center align-items-center">
      <div class="col-md-9 py-4">
        @php $count = 0 @endphp
        @foreach($questions as $question)
        @php $count++  @endphp
        <div class="z-depth-2 rounded" style="padding: 1em; margin-bottom: 1em">
          <span class="text-left">
            <h6 class="font-weight-bold green-text">{{$count.'. '.$question->question}} ?
            </h6>
          </span>
          <span>
            <p class="mb-4" style="margin-left: 50px">{!! $question->answer !!}</p>
          </span>
        </div>
        @endforeach

      </div>
    </div>
  </section>
</div>


@include('partials.footer')


@endsection

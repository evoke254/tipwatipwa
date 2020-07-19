
@extends('layouts.app-home')
@include('partials.topnav')
@section('content')

<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel" style="height: auto !important; ">
  <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <div class="view rounded swift-polygon" style="background-image: url({{ asset('storage/images/top-collage.png') }}), linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(191,189,189,1) 30%, rgba(89,89,89,1) 100%); background-size: cover; background-repeat: no-repeat; background-position: center; height: 450px; max-height: 450px !important" >
            <div class="mask rgba-black-light"></div>
          </div>
        </div>
    </div>
</div>


<div class="container my-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10 text-center">    
            <h2 class="font-weight-bold text-center green-text">{{env('APP_NAME')}} Gallery</h2>
        </div>
    </div>
    <div class="row d-flex justify-content-center align-items-center" id="test">
        @foreach ($content as $photo)
               <div class="col-md-3 my-2" data-src="{{asset('storage/'.$photo->image)}}" data-download-url="false">
                <a class="view overlay zoom col-lg-3 col-md-4 pic p-0 m-0" style="height: 155px !important" >
                    <img src="{{ asset('storage'.$photo->image) }}" class="z-depth-1 img-fluid rounded" alt="Swiftpay Africa" pointer-events: none;>
                    <div class="mask flex-center" style="cursor: pointer;">
                    </div>
                </a>
               </div>

        @endforeach
    </div>
</div>
        @include('partials.footer')

        
@endsection
@section('scripts')
            $(".img-fluid").addClass("wow fadeIn z-depth-1-half");

            $('#test').lightGallery({
            thumbnail: 'false',
            download: 'false',
            fullScreen: 'true',
            share: 'false'
        });
@endsection

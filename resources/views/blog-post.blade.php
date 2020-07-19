
@extends('layouts.app-home')
@section('content')


<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <div class="view rounded swift-polygon" style="background-image: url({{ asset('storage'.$post->image) }}), linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(191,189,189,1) 30%, rgba(89,89,89,1) 100%); background-size: cover; background-repeat: no-repeat; background-position: center; height: 375px; max-height: 375px !important" >
            <div class="mask rgba-black-light"></div>
          </div>
          <div class="carousel-caption mt-n5">
            <h3 class="h3-responsive"> {{$post->title}} </h3>
          </div>
        </div>
    </div>
</div>


<div class="container my-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12">
           <h6 class="text-center font-weight-bold kahaki-heading mb-5">
               {{$post->page}} </h6>
      </div>
    </div>
    <div class="row d-flex justify-content-center">
      <div class="col-md-10 no-gutter">
            <img class="text-center img-responsive img-fluid rounded" style="height: 400px" src="{{ asset('storage/'.$post->image) }}"  alt="swiftpay sltns">
      </div>
        <div class="col-md-2 no-gutter">
            <h6 class="text-center font-weight-bold kahaki-heading mb-5">Other Posts</h6>
            <hr>
            @foreach ($posts as $post)
            <a href="/blog-posts/{{$post->id}}">
                <p style="font-size: .8em" class="text-muted">
                    #{{$post->id}} | {{$post->page}}
                </p>
            </a>
            @endforeach
        </div>
        <div class="col-md-12">
          <hr class="my-5">
        </div> 
      </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-12 my-2">
          <h3 class="text-center"> {{$post->page}} </h3>
            {!! $post->content !!}
        </div>
    </div>
</div>

@include('partials.footer')

@endsection

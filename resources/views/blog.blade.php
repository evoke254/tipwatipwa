
@extends('layouts.app-home')

@include('partials.topnav')
@section('content')
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <div class="view rounded swift-polygon" style="background-image: url({{ asset('storage/images/top-collage.png') }}), linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(191,189,189,1) 30%, rgba(89,89,89,1) 100%); background-size: cover; background-repeat: no-repeat; background-position: center; height: 350px; max-height:350px !important" >
            <div class="mask rgba-black-light"></div>
          </div>
        </div>
    </div>
</div>

<div class="container-fluid my-1">
    <div class="row d-flex justify-content-center">   
        <div class="col-md-12 text-center">
            <h3 class="short-border">{{env('APP_NAME')}} Blog</h3>

        </div>  
        <div class="col-md-3">
            <h6 class="text-center font-weight-bold green-text mb-5">Recent Posts</h6>
            @foreach($posts as $post)
            <a href="/blog-posts/{{$post->id}}">
                <p style="font-size: .8em" class="text-muted">
                    {{$post->page}}
                </p>
            </a>
            <hr>               
            @endforeach
        </div>        
        @foreach($posts as $post)
        <div class="col-md-7">
            <div id="w-100 carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                  <img class="w-100 rounded img-responsive img-fluid" src="{{ asset('storage'.$post->image) }}"
                    alt="First slide">
                </div>
              </div>  <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                <i style="font-size: 1em" class="fa fa-chevron-circle-left text-white" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                <i style="font-size: 1em" class="fa fa-chevron-circle-right text-white" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
              </a>
            </div>

            <div class="mt-3">  
                <a href="/blog-posts/{{$post->id}}">
                    <h3 class="font-weight-bold mb-4 text-center text-muted">{{$post->page}}</h3>
                </a>
            </div>
            <div class="my-2">
                <p style="font-size: .8em" class="font-italic">Posted By: Admin | {{date('D, jS-m-Y', strtotime($post->updated_at))}} </p>
                <p style="font-size: 1em">
                    {!!substr($post->content,0,300) !!}
                </p>
                <a style="font-size: 1em" class="green-text" href="/blog-posts/{{$post->id}}">
                    Read More >>
                </a>
            </div>
        </div>
        <div class="col-md-12 mt-n5">
            <hr>
        </div>
        @endforeach
    </div>
</div>
</div>
@include('partials.footer')


@endsection

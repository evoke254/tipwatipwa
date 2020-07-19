  <div id="carousel-example-1z" class="carousel topcarousel slide carousel-fade " data-ride="carousel" data-interval="2500">
    <!--<ol class="carousel-indicators">
      @for($i=0; $i < $carouselitems->count(); $i++)
      @if($i = 1)
      <li data-target="#carousel-example-1z" data-slide-to="{{$i}}" class="active"></li>
      @endif
      <li data-target="#carousel-example-1z" data-slide-to="{{$i}}"></li>
      @endfor
    </ol> -->
    <div class="carousel-inner" role="listbox">
      @foreach ($carouselitems as $key => $carousel)
      
      <div class="carousel-item @if ($key == 0) active @endif">
        <div class="view" style="background-image: url({{ asset('storage'.$carousel->image) }}); background-repeat: no-repeat; background-size: cover; background-position: center;">
          <div class="mask rgba-black-light d-flex justify-content-center align-items-end p-5">
            <div class="text-center white-text mt-5 wow fadeIn">
             <!-- <h1 class="mb-4">
                <strong> {{$carousel->heading}} </strong>
              </h1>
              <p>
                <strong>{{$carousel->paragraph}}</strong>
              </p>
              <a href="{{route('forms')}}" class="btn btn-dark-green btn-md">
                Book
                <i class="fa fa-certificate ml-2" aria-hidden="true"></i>
              </a> -->
              <h1 style="color: {{env('LIME')}}">Set Your Goals and Demolish Them</h1>

            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>


    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" style="font-size: 5.5em" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
      <span class="carousel-control-next-icon" style="font-size: 5.5em" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->

  </div>
  <!--/.Carousel Wrapper-->
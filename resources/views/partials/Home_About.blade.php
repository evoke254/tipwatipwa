  <section class="mt-5 wow fadeIn">
      <div class="container">
            <div class="row d-flex justify-content-center">
              <div class="col-md-8 mb-4">
                <div class="card">
                  <div class="card-header text-center">
                    <h5 class="font-weight-bold">Easy Search for our registered members</h5>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-9">
                        <form class="pull-left">
                          <div class="container row align-middle">
                            <div class="md-form col">
                              <i class="fa fa-search prefix green-text"></i>
                              <input type="text" id="company-search" class="form-control">
                              <label for="company-search" class="font-weight-light" style="margin-left: 5em" >Business name</label>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="col-md-2 mt-3">
                        <button class="btn btn-sm btn-dark-green" type="submit">Search</button>            
                      </div>
                    </div>
                  </div>
              <!--    <div class="card-footer text-muted text-center mt-n2 p-n1">
                      <button class="btn btn-sm btn-dark-green" type="submit">Search</button>
                  </div> -->
                </div>

              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header">
                    <h5 class="font-weight-bold text-center">Recent | Trending </h5>
                    <!-- Remember me -->
                  </div>
                  <div class="card-body">

                    <a href="#" class="green-text">See More...</a>
                  </div>
                </div>
              </div>
            </div>
      </div>
  </section>
<!--  <hr class="my-2">
-->
  <section class="mt-5">
    @php   $count = 0; @endphp
    @foreach($homepage_content as $content)
      <div class="container">
        <div class="row d-flex justify-content-center align-items-center w-100 wow fadeIn">
          @if(!empty($content->image))
          <div class="col-md-7 align-items-middle">
            <img class="img-responsive img-fluid" style="border-radius: 2em; border-bottom-right-radius: 40em 10em; border-top-right-radius: 40em 10em; " src="{{ asset('storage'.$content->image) }}">
          </div>
          @endif
          <div class="col-md mb-4 py-5 pl-5 rounded tv-box">
              {!! $content->content !!}
          </div>
        </div>
      </div>
    @endforeach
  </section>
<!--<section class="green lighten-4 mt-5 wow fadeIn">
  <div class="container">
    <div class="row d-flex justify-content-center ">
      <div class="col-md-10 text-center mt-5">
        <h3>OUR CLIENTS</h3>
      </div>
      <div class="col-md-10 mx-2 my-4">
        <div class="col-md rounded z-depth-1 my-2 grey lighten-5">
          <i class="fa fa-certificate" style="font-size: 5em" aria-hidden="true"></i>
        </div>
      </div>
    </div>
  </div>
</section> -->



        
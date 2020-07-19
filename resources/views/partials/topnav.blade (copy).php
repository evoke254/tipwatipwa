    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
      <div class="container">
        <!--Logo image -->

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="no-desk-dsply rounded border border-light mt-2" style="margin-left: 10vw">
            <a href="{{ url('/') }}">
                <img style="height: 90px" class="img-responsive rounded border-success img-fluid" src="{{ asset('images/logo.jpg') }}">
            </a>
        </div>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav font-weight-bold">
        
            <li class="nav-item"><a class="nav-link active" href="{{route('home')}}">
              <i class="fa fa-home" aria-hidden="true"></i>
                Home
                <span class="sr-only">(current)</span>
                </a>
            </li>        
            <li class="nav-item"><a class="nav-link active" href="{{route('about')}}">
              <i class="fa fa-users mr-2" aria-hidden="true"></i>
                Services
                <span class="sr-only">(current)</span>
                </a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-calendar mr-2" aria-hidden="true"></i>
                Calendar
                <i class="fa fa-chevron-circle-down" aria-hidden="true" style="font-size: .6em"></i>
              </a>
              <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item " href="/hikes-schedule">TT Events</a>
                <a class="dropdown-item " href="/studio-schedule">TT Gym Schedule</a>
              </div>
            </li>

            <li class="nav-item"><a class="nav-link" href=" {{route('trainers')}} ">
                <i class="fa fa-star mr-2" aria-hidden="true"></i>
                Your Trainers
            </li>
          </ul>

          <!--Logo image -->
          <a href="{{ url('/') }}" class="no-mob-dsply swiftlogo">
              <img class="img-responsive rounded border-success logoImg" style="height: 100px" src="{{ asset('images/logo.jpg') }}">
          </a>



          <ul class="navbar-nav ml-auto mr-2 font-weight-bold">
            <li class="nav-item"><a class="nav-link" href=" {{route('blog-posts')}} ">
              <i class="fa fa-envelope-open mr-2" aria-hidden="true"></i>
                Coach's Corner </a>
            </li>

            <li class="nav-item"><a class="nav-link" href=" {{route('gallery')}} ">
              <i class="fa fa-film mr-2" aria-hidden="true"></i>
              Gallery </a>
            </li>

            <li class="nav-item"><a class="nav-link" href=" {{route('contact')}} ">
                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                Contact Us
            </li>
            <li class="nav-item mt-n3">
              <a class="nav-link" href="{{route('faqs')}}"> 
                <i class="fa fa-question-circle mr-2" aria-hidden="true"></i>
               FAQs 
             </a>
           </li>
          </ul>

        </div>

      </div>
    </nav>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar" style="background-color: {{env('KHAKI')}}">
      <div class="container">
      
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

  


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto font-weight-bold" style="font-size: 16px">
              <li class="nav-item"><a class="nav-link active" href="{{route('home')}}">
              <i class="fas fa-home mr-1"></i>
                Home
                <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item"><a class="nav-link active" href="{{route('events_and_experiences')}}">
              <i class="fas fa-hiking mr-1"></i>
                Events & Experiences
                <span class="sr-only">(current)</span>
                </a>
            </li>

           
            <li class="nav-item">
              <a class="nav-link" href=" {{route('blog-posts')}} ">
              <i class="fa fa-envelope-open mr-1" aria-hidden="true"></i>
                Coach's Corner </a>
            </li>

            <li class="nav-item"><a class="nav-link" href=" {{route('gallery')}} ">
              <i class="fa fa-film mr-1" aria-hidden="true"></i>
              Gallery </a>
            </li>

            <li class="nav-item"><a class="nav-link" href=" {{route('contact')}} ">
                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                Contact Us
            </li>
            <li class="nav-item mt-n3">
              <a class="nav-link" href="{{route('faqs')}}"> 
                <i class="fa fa-question-circle mr-1" aria-hidden="true"></i>
               FAQs 
             </a>
           </li>
          </ul>

        </div>

      </div>
    </nav>
    <!-- Navbar -->
    <nav class="navbar fixed-top green darken-4 navbar-expand-lg navbar-dark scrolling-navbar">
      <div class="container-fluid">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="no-desk-dsply rounded border border-light mt-2" style="margin-left: 20vw">
            <a href="{{ url('/') }}">
                <img style="opacity: 0.95; height: 75px" class="img-responsive rounded border-success img-fluid" src="{{ asset('images/logo.png') }}">
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
            <li class="nav-item">
              <a class="nav-link" href="{{route('about')}}">
                <i class="fa fa-users mr-2" aria-hidden="true"></i>
                About
              </a>
            </li>

            <li class="nav-item dropdown ">
              <a class="nav-link" id="navbarDropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-certificate mr-2" aria-hidden="true"></i>
                Apply For Certification
                <i class="fa fa-chevron-circle-down" aria-hidden="true" style="font-size: .6em"></i>
              </a>
              <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item " href="/halal">What is Halal</a>
                <a class="dropdown-item " href="/halal-certification">Benefits of Halal Certification</a>
                <a class="dropdown-item " href="{{route('certification_process')}}">Certification Process</a>
                <a class="dropdown-item " href="{{route('forms')}}">Certification Forms</a>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link" id="tab2" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-briefcase mr-2" aria-hidden="true"></i>
                 Certified Companies
                <i class="fa fa-chevron-circle-down" aria-hidden="true" style="font-size: .6em"></i>
              </a>
              <div class="dropdown-menu dropdown-primary" aria-labelledby="tab2">
                <a class="dropdown-item " href="{{route('certified')}}">Certified Companies </a>
                <a class="dropdown-item " href="{{route('decertified')}}">Decertified Companies </a>
              </div>
            </li>
          </ul>
           <!--Logo image -->
          <a href="{{ url('/') }}" class="no-mob-dsply swiftlogo">
              <img class="img-responsive rounded border-success img-fluid logoImg" style="opacity: 0.8" src="{{ asset('images/logo2.jpg') }}">
          </a>

          <ul class="navbar-nav ml-auto mr-2 font-weight-bold">
             <li class="nav-item"><a class="nav-link" href=" {{route('complaints')}} ">
                <i class="fa fa-comment mr-2" aria-hidden="true"></i>
                 Complaints & Appeals
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link mt-n3" id="tab2" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-globe mr-2" aria-hidden="true"></i>
                News
                <i class="fa fa-chevron-circle-down" aria-hidden="true" style="font-size: .6em"></i>
              </a>
              <div class="dropdown-menu dropdown-primary" aria-labelledby="tab2">
                <a class="dropdown-item " href=" {{route('bulletins')}} ">Bulletin</a>
                <a class="dropdown-item " href="{{route('halal-blog-posts')}} ">News and Articles</a>
              </div>
            </li>
            <li class="nav-item"><a class="nav-link" href=" {{route('gallery')}} ">
              <i class="fa fa-film mr-2" aria-hidden="true"></i>
              Gallery </a>
            </li>
            <li class="nav-item dropdown"><a class="nav-link" href=" {{route('contact')}} ">
                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                Contact Us
            </li>
            <li class="nav-item mt-n3"><a class="nav-link" href="{{route('faqs')}}"> 
              <i class="fa fa-question-circle mr-2" aria-hidden="true"></i>
             FAQs </a></li>

          </ul>

        </div>

      </div>
    </nav>
    <!-- Navbar -->
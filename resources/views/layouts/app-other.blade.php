<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   {{$content[0]->facebook ?? ''}}
    {{$content[0]->google ?? ''}}

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link rel = "icon" href="{{ asset('images/logo.png') }}" type = "image/x-icon"> 
    <title>Kenya Bureau of Halal Certification</title>


     <meta name="title" content="Kenya Bureau of Halal Certification -KBHC Find out businesses that are Halal Certified">
    <meta name="keywords" content="Halal Certification in Africa, What is Halal, Halal Certification Process.">
    <meta name="description" content="KBHC is in charge of probing, vetting and sanctioning food processors, abbatoirs, restaurants, kitchens and catering facilities to ensure they meet World Halal standards">
    <meta property="og:title" content="Kenya Bureau of Halal Certification -KBHC Find out businesses that are Halal Certified">
    <meta property="og:description" content="KBHC is in charge of probing, vetting and sanctioning food processors, abbatoirs, restaurants, kitchens and catering facilities to ensure they meet World Halal standards">
    <meta property="og:image" content="{{ asset('images/certificate.png') }}">


</head>
<body>
    @include('partials.topnav01')
    <div id="myLoader" class="lds-roller">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div id="app" class="d-none">
        <main class="">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}" ></script>
        @include('sweetalert::alert')
    <script src="{{asset('js/swift.js')}}"></script>
    <script type="text/javascript">
        
        $(window).on('load', function() {

           setTimeout(function(){ $('#myLoader').hide(); }, 2000);
         //   $('#app').show();
            setTimeout(function(){ 
                var app = document.getElementById("app");
                app.classList.remove("d-none");
                app.className = "animated pulse"; 
            }, 2);
          });

      new WOW().init();
    </script>
    
<script type="text/javascript">
    $(document).ready(function() {
        @yield('scripts')
         });
</script>

</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! SEO::generate() !!}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Spinnaker" rel="stylesheet">
</head>
<body>
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
    <div id="app" class="d-none h-100" style="height: 1000px">
      
        <main class="" style="margin-top: 20vh !important">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{asset('js/swift.js')}}"></script>
    <script type="text/javascript">
        
        $(window).on('load', function() {

           setTimeout(function(){ $('#myLoader').hide(); }, 2000);
         //   $('#app').show();
            setTimeout(function(){ 
                var app = document.getElementById("app");
                app.classList.remove("d-none");
                app.className = "animated pulse"; 
            }, 10);
          });

      new WOW().init();
    </script>
    
@include('sweetalert::alert')

</body>
</html>

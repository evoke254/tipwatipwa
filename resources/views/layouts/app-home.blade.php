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
    <link rel = "icon" href="{{ asset('images/logo1.png') }}" type = "image/x-icon">
    <title>{{env('APP_NAME')}} | Swift Apps Africa</title>


     <meta name="title" content="{{env('APP_NAME')}}">
    <meta name="keywords" content="{{env('APP_NAME')}}">
    <meta name="description" content="{{env('APP_NAME')}}">
    <meta property="og:title" content="{{env('APP_NAME')}} | Swift Apps Africa">
    <meta property="og:description" content="{{env('APP_NAME')}} - Best Web Applications in the market ">
    <meta property="og:image" content="{{ asset('images/logo1.png') }}">


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
    <div>
        <main>
            @yield('react')
        </main>
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

      @yield('scripts')
    </script>


</body>
</html>

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
</head>
	<body>
    @include('partials.topnav01')
		<div class="container" style="margin-top: 10vh">
			<div class="row d-flex justify-content-center align-items-center">
				<div class="col-md-8 mt-5 mb-2">
					<p class="text-danger text-center" >***You may have to move your mouse over a file to see the download button***</p>
				</div>
			    <div class="col-md-8 my-4">
			         <iframe width="750" height="1500" src="{{asset('storage'.$content->path)}}" allowfullscreen class="rounded"></iframe>
			    </div>
			</div>
		</div>
	</body>
</html>

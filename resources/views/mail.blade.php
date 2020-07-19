<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Spinnaker" rel="stylesheet">
</head>
<body style="color: #371330FF">
    <h5>New mail from : {{$mail_payload['name'] ?? ''}}.</h5>
    <p>Please find mail below: </p>
    <hr>
    <p>
        {{$mail_payload['body'] ?? ''}}
    </p>
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Spinnaker" rel="stylesheet">
</head>
<body style="color: #371330FF">
    <h5>Thank you {{$mail_payload['name'] ?? ''}} for that mail.</h5>
    <p>Your concern is receiving attention. We shall be in touch shortly.</p>
</body>
</html>

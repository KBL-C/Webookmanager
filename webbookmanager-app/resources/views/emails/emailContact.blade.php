<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'WebBookmanager') }}</title>

</head>
<body>

    <p><strong>Book name:</strong>{{$contact['book']}}</p>

    <p><strong>Name:</strong>{{$contact['name']}}</p>
    <p><strong>Email:</strong>{{$contact['email']}}</p>
    <p><strong>Phone number:</strong>{{$contact['phone']}}</p>
    <p><strong>Direction:</strong>{{$contact['direction']}}</p>
    <p><strong>Message:</strong>{{$contact['message']}}</p>

</body>

</html>

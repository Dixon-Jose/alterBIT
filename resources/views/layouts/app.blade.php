<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'alterBIT') }} | @yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,400,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700" rel="stylesheet"> 

    <!-- Styles -->
    <link rel="stylesheet/less" type="text/css" href="/css/main.less">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/js/jqueryUI/jquery-ui.css')}}">
</head>
<body>
    @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/js/less.js" type="text/javascript"></script>
    <script src="/js/jquery.js" type="text/javascript"></script>
    <script src="/js/jqueryUI/jquery-ui.js" type="text/javascript"></script>
    <script src="/js/alterbit.js" type="text/javascript"></script>
</body>
</html>

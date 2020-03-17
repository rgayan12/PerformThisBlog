<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
     
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-type"
      content="text/html; charset=utf-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Perform This Blog</title>
     
    <!-- Scripts -->
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('mdbpro/css/mdb.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.tiny.cloud/1/52qh72w8mno3y2eykpa3tz58qqcywnk0d3a6szo0wg8gcmc6/tinymce/5/tinymce.min.js"></script>

    <!-- Styles -->
    <!-- FAVICON -->
  <link href="https://performthis.com/images/logo/favicon.png" rel="shortcut icon">
</head>
<body>
        @yield('content')
       
       
        @include('layouts.javascript')
</body>
</html>

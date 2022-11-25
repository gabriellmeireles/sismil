<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SISMIL') }}</title>
        <!-- CSS files -->
        <base href="/">
        <link href="{{ asset('dist/css/tabler.css') }}" rel="stylesheet"/>
    
    </head>
    <body  class=" border-top-wide border-primary d-flex flex-column">
        
        @yield('content')
        
        <!-- JS files -->
        <script src="{{ asset('dist/js/tabler.js') }}"></script>
    </body>
</html>
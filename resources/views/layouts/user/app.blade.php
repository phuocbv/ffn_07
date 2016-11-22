<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>@yield('title')</title>
        <link href="{{ asset('user_asset/customs/css/customs.css') }}" rel="stylesheet">
        <link href="{{ asset('user_asset/customs/css/homepage.css') }}" rel="stylesheet">
        <script type="text/javascript" src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <script type="text/javascript" src="{{ asset('user_asset/customs/js/customs.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/fonts/glyphicons-halflings-regular.woff') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/fonts/glyphicons-halflings-regular.woff2') }}">
        <script type="text/javascript" src="{{ asset('bower_components/jquery-timeago/jquery.timeago.js') }}"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('user_asset/customs/css/media.css') }}">
    </head>
    <body>

        <!-- header -->
        @include('layouts.user.header')
        <!-- end header -->

        <!-- content -->
        <div class="container" id="container">
            @yield('content')
        </div>
        <!-- end content -->

        <!-- footer -->
        <div class="break break-footer"></div>
        @include('layouts.user.footer')
        <!-- end footer -->
    </body>
</html>

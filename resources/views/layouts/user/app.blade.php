<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Laravel</title>
      
        <link href="{{ asset('user_asset/customs/css/customs.css') }}" rel="stylesheet">
        <link href="{{ asset('user_asset/customs/css/homepage.css') }}" rel="stylesheet">
        <script type="text/javascript" src="{{ asset('user_asset/customs/js/customs.js') }}"></script>
       
        {!! Html::style('css/app.css') !!}
        {!! Html::script('js/app.js') !!}
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

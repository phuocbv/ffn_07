<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@lang('text.admin_title')</title>
    {!! Html::style('css/app.css') !!}
    {!! Html::script('js/app.js') !!}
    <link href="{{ asset('admin_asset/css/admin.css') }}" rel="stylesheet">
    <script src="{{ asset('admin_asset/js/admin.js') }}"></script>
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <script src="{{ asset('metisMenu/dist/metisMenu.min.js') }}"></script>
</head>
<body>
    <div id="wrapper">
        @include('layouts.admin.header')
        @yield('content')
    </div>
</body>
</html>

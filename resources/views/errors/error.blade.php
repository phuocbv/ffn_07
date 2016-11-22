@extends('layouts.user.app')
@section('title')
    @lang('text.error')
@stop

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('user_asset/customs/css/error.css') }}">
    <h1 class='page-header'></h1>
    <ol class='breadcrumb'>
        <li><a href="{{ route('home') }}">@lang('text.home_title')</a></li>    
    </ol>
    <hr>
    <div class="title error">@lang('text.not_found')</div>    
@stop

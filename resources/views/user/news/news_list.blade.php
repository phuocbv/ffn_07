@extends('layouts.user.app')
@section('title')
    @lang('news.news_list_header')
@stop

@section('content')
    <h1 class='page-header'></h1>
    <ol class='breadcrumb'>
        <li><a href="{{ route('home') }}">@lang('text.home_title')</a></li>
        @if ($cate)
            <li>
                <a href="{{ route('news-category.show', $cate->id) }}">
                    {{ $cate->name }}
                </a>
            </li>
        @endif
    </ol>
    <hr>
    <div class='row'>
        <div class='col-lg-9 col-sm-12 col-md-9 col-xs-12'>
            <div class='col-lg-12 col-sm-12 col-md-12 col-xs-12'>
                @include('user.news.news_title')
            </div>
            <div class='break'></div>
            <div class='col-lg-12 col-sm-12 col-md-12 col-xs-12'>
                @foreach ($news as $key => $element)              
                    <div class='row margin-top10'>
                        <div class='col-md-3 col-lg-3 col-sm-6 col-xs-6'>
                            <a href="{{ route('news.show', $element->id) }}">
                                <img class='img-responsive slide-icon img-thumbnail'
                                    src='{{ $element->title_image }}'
                                    alt='{{ $element->title }}' title='{{ $element->title }}'>
                            </a>
                        </div>
                        <h4><a href="{{ route('news.show', $element->id) }}">{{ $element->title }}</a></h4>
                        <div class='news-list-title-time-ago'>
                            <abbr class='timeago' title='{{ $element->created_at }}'></abbr>
                        </div>
                        <div class='news-list-description'>
                            {{ $element->description }}
                        </div>
                    </div>
                    <div class='break'></div>
                @endforeach
                <div>{{ $news->links() }}</div>
            </div>
        </div>
        <div class='col-lg-3 col-sm-12 col-md-3 col-xs-12 row'>
            @include('user.news.readest_news')
        </div>
    </div>
    <script type='text/javascript' src="{{ asset('user_asset/customs/js/news_list.js') }}"></script>
@stop

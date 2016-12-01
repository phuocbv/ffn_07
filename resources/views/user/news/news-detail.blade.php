@extends('layouts.user.app')
@section('content')
    <h1 class='page-header'></h1>
    <ol class="breadcrumb">
        <li><a href='{{ route('home') }}'>@lang('text.home_title')</a></li>
        <li><a href=''>@lang('news.news_detail')</a></li>
    </ol>
    <hr>
    <div class='row'>
        <div class='col-md-2 col-lg-2 col-sm-3 col-xs-3'>
            @include('user.news.other-news')
        </div>

        <div class='col-lg-7 col-sm-9 col-md-7 col-xs-9'>
            @if ($news)
                <h2 class='news-title-in-news-detail'><b>{{ $news->title }}</b></h2>
                <div>
                    <ol class='breadcrumb breadcrumb-date'>
                        <span>{!! $news->created_at->format('H:i:s Y-m-d') !!}</span>
                    </ol>
                </div>
                <div>
                    <h4><b>{{ $news->description }}</b></h4>
                    <div class='icon-slide-container'>
                        <img src='{{ $news->title_image }}' class='img-responsive slide-icon'>
                    </div>
                    <p class='marg'></p>
                    <div class='space10'></div>
                    <div class='break'></div>
                    <div class='space10'></div>
                    <div class='newsContentDetail'>{!! ($news->content) !!}</div>
                </div>
                <div class='well'>
                    <h4><b>@lang('news.write_comment')</b><span class='glyphicon glyphicon-pencil'></span></h4>
                    <div class='form-group'>
                        <textarea id='content-comment' class='form-control' rows='3'></textarea>
                    </div>
                    <button id='btn-comment' class="btn btn-primary">@lang('news.comment')</button>
                </div>
                <hr>
                <div class='comment comment-content'>
                    @foreach ($comments as $key => $element)
                        <div  class='media'>
                            <a class='pull-left' href='javascript:void(0)'>
                                <img class='media-object img-circle img-responsive slide-icon'
                                    src='{{ $element->user->avatar }}'>
                            </a>
                            <div class='media-body'>
                                <h4 class='media-heading'>{{ $element->user->name }}
                                    <small>{{ $news->created_at->format('H:t:s d/M/yy') }}</small>
                                </h4>
                                {{ $element->content }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif     
        </div>

        <div class='col-lg-3 col-sm-12 col-md-3 col-xs-12 row'>
            @include('user.news.readest_news')
        </div>
    </div>
    <script type='text/javascript' src='{{ asset('user_asset/customs/js/news-detail.js') }}'></script>
    <script type='text/javascript'>
        var news_detail = new news_detail();
        @if (Auth::check())
            news_detail.init({
                user_id: '{{ Auth::user()->id }}',
                news_id: '{{ $news->id }}',
                name: '{{ Auth::user()->name }}',
                avatar: '{{ Auth::user()->avatar }}',
            });
        @else
            news_detail.init({ user_id: null, news_id: null, name: null, avatar: null });
        @endif
    </script>
@stop

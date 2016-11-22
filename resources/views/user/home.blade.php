@extends('layouts.user.app')
@section('title')
    @lang('text.home_title')
@stop

@section('content')
    <h1 class='page-header'></h1>
    <div class='row'>
        {{-- left --}}
        <div class='col-md-8'>
            <div class='row'> 
                @foreach ($titleNews as $key => $element)
                    @if ($key == 0)
                        <div class='col-md-8'>                           
                            <div class='carousel-inner'>
                                <div class='item active'>
                                    <a href="{{ route('news.show', $element->id) }}">
                                        <img class='slide-image img-responsive img-thumbnail' 
                                            src="{{ $element->title_image }}"
                                            title="{{ $element->title }}" alt="{{ $element->title }}">
                                    </a>
                                    <div class='carousel-caption' align='center'>
                                        <a href="{{ route('news.show', $element->id) }}"><h2>{{ $element->title }}</h2></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif ($key == 1)
                        <div class='col-md-4'>
                        <div class='row margin-top10'>
                            <div class='col-md-6 col-sm-3 col-xs-3'>
                                <a href="{{ route('news.show', $element->id) }}">
                                    <img class='img-responsive img-thumbnail' src="{{ $element->title_image }}">
                                </a>
                            </div>
                            <div class='space5'></div>
                            <div class='col-md-6 col-sm-9 col-xs-9'>
                                <a href="{{ route('news.show', $element->id) }}">
                                    {{ MyFuncs::handleTitle($element->description, 10) }}
                                </a>
                            </div>
                            <div class='title-time-ago'>
                                <abbr class='timeago' title="{{ $element->created_at }}"></abbr>
                            </div>
                        </div>
                        <div class='break'></div>
                    @elseif ($key != ($titleNews->count() - 1))
                        <div class='row margin-top10'>
                            <div class='col-md-6 col-sm-3 col-xs-3'>
                                <a href="{{ route('news.show', $element->id) }}">
                                    <img class='img-responsive img-thumbnail' src="{{ $element->title_image }}">
                                </a>
                            </div>
                            <div class='space5'></div>
                            <div class='col-md-6 col-sm-9 col-xs-9'>
                                <a href="{{ route('news.show', $element->id) }}">
                                    {{ MyFuncs::handleTitle($element->description, 10) }}
                                </a>
                            </div>
                            <div class='title-time-ago'>
                                <abbr class='timeago' title="{{ $element->created_at }}"></abbr>
                            </div>  
                        </div>
                        <div class='break'></div>
                    @else
                        <div class='row margin-top10'>
                            <div class='col-md-6 col-sm-3 col-xs-3'>
                                <a href="{{ route('news.show', $element->id) }}">
                                    <img class='img-responsive img-thumbnail' src="{{ $element->title_image }}">
                                </a>
                            </div>
                            <div class='space5'></div>
                            <div class='col-md-6 col-sm-9 col-xs-9'>
                                <a href="{{ route('news.show', $element->id) }}">
                                    {{ MyFuncs::handleTitle($element->description, 10) }}
                                </a>
                            </div>
                            <div class='title-time-ago'>
                                <abbr class='timeago' title="{{ $element->created_at }}"></abbr>
                            </div>  
                        </div>
                        <div class='break'></div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class='row col-md-12'>
                <div class='space20'></div>
                <div class='row'>
                    @foreach ($otherNews as $key => $element)
                         <div class='col-xs-6 col-sm-6 col-lg-3 col-md-3'>
                            <div class='thumbnail'>
                                <a href="{{ route('news.show', $element->id) }}">
                                    <img src="{{ $element->title_image }}" class='img-responsive slide-icon'>
                                </a>
                                <div class='space10'></div>
                                <div class='col-md-12 col-sm-12 col-xs-12'>
                                    <a href="{{ route('news.show', $element->id) }}">
                                        {{ MyFuncs::handleTitle($element->title, 10) }}
                                    </a>
                                </div>
                                <div class='ratings'>
                                    <p>{{ $element->view_number }} @lang('user.view_number')</p>
                                    <p class='view-time-ago'>
                                        <abbr class='timeago' title="{{ $element->created_at }}"></abbr>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <h1 class='page-header col-md-12'>      
                @lang('user.category_hot_news')
            </h1>
            <div class='row-item row'>
                @foreach ($hotNews as $key => $element)
                    @if ($key == 0)
                        <div class='col-lg-6 col-sm-6 col-md-6 col-xs-6'>
                            <div class='icon-slide-container'>
                                <a href="{{ route('news.show', $element->id) }}">
                                    <img src="{{ $element->title_image }}"
                                        class='img-responsive slide-icon img-thumbnail'
                                        title="{{ $element->title }}" alt="{{ $element->title }}">
                                </a>
                            </div>
                            
                            <h4>
                                <a href="{{ route('news.show', $element->id) }}">
                                    <b>{{ $element->title }}</b>
                                </a>
                            </h4>
                            <div class='title-time-ago'>
                                <abbr class='timeago' title="{{ $element->created_at }}"></abbr>
                            </div>
                            <p class='marg'>{{ $element->description }}</p>
                        </div>
                    @else
                        <div class='col-lg-6 col-sm-6 col-md-6 col-xs-6'>
                            <div class='row margin-top10'>
                                <div class='col-md-4 col-sm-4 col-lg-4 col-xs-4'>
                                    <a href="{{ route('news.show', $element->id) }}">
                                        <img class='img-responsive img-thumbnail' src="{{ $element->title_image }}"
                                            title="{{ $element->title }}" alt="{{ $element->title }}">
                                    </a>
                                </div>
                                <div class='col-md-8 col-sm-8 col-lg-8 col-xs-8 title-news-chidle'>
                                    <a href="{{ route('news.show', $element->id) }}"><b>{{ ($element->title) }}</b></a>
                                </div>
                                <p class='marg marg-chidle'>{{ ($element->description) }}</p>
                                <div class='title-time-ago'>
                                    <abbr class='timeago' title="{{ $element->created_at }}"></abbr>
                                </div>
                                <div class='break'></div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class='break'></div>
            </div>

            @foreach ($cate as $keyCate => $c)
                <h1 class='page-header col-md-12'>
                    <a href="{{ route('news-category.show', $c->id) }}">{{ $c->name }}</a>
                </h1>
                <div class='row row-item'>
                    @foreach ($c->news as $keyNews => $news)
                        @if ($keyNews == 0)
                            <div class='col-lg-6 col-sm-6 col-md-6 col-xs-6'>
                                <div class='icon-slide-container'>
                                    <a href="{{ route('news.show', $news->id) }}">
                                        <img src="{{ $news->title_image }}" class='img-responsive slide-icon img-thumbnail' 
                                            title="{{ $news->title_image }}" alt="{{ $news->title_image }}">
                                    </a>
                                </div>
                                <h4>
                                    <a href="{{ route('news.show', $news->id) }}">
                                        <b>{{ $news->title }}</b>
                                    </a>
                                </h4>
                                <div class='title-time-ago'>
                                    <abbr class='timeago' title="{{ $news->created_at }}"></abbr>
                                </div>
                                <p class='marg'>{{ $news->description }}</p>
                            </div>
                        @else
                            <div class='col-lg-6 col-sm-6 col-md-6 col-xs-6'>
                                <div class='row margin-top10'>
                                    <div class='col-md-4 col-sm-4 col-lg-4 col-xs-4'>
                                        <a href="{{ $news->title_image }}">
                                            <img class='img-responsive img-thumbnail' src="{{ $news->title_image }}"
                                                alt="{{ $news->title }}" title="{{ $news->title }}">
                                        </a>
                                    </div>
                                    <div class='col-md-8 col-sm-8 col-lg-8 col-xs-8 title-news-chidle'>
                                        <a href="{{ route('news.show', $news->id) }}"><b>{{ $news->title }}</b></a>
                                    </div>
                                    <div class='title-time-ago'>
                                        <abbr class='timeago' title="{{ $news->created_at }}"></abbr>
                                    </div>
                                    <p class='marg-chidle marg'>{{ ($news->description) }}</p>
                                    @if ($keyNews != ($news->count() - 1))
                                        <div class='break'></div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                    @if ($keyCate != ($cate->count() - 1))
                        <div class='break'></div>
                    @endif
                </div>
            @endforeach
        </div>

        {{-- right --}}
        <div class='col-md-4'>
            @if ($otherNews)
                <div class='col-xs-12 col-sm-12 col-lg-12 col-md-12'>
                    <div class='thumbnail'>
                        <img src="{{ $otherNews[0]->title_image }}" class='img-responsive slide-icon'>
                        <div class='caption'>
                            <div class='title-time-ago'>
                                <abbr class='timeago' title="{{ $otherNews[0]->created_at }}"></abbr>
                            </div>
                            <b><a href="{{ route('news.show', $otherNews[0]->id) }}">{{ $otherNews[0]->title }}</a></b>
                            <p>{{ $otherNews[0]->description }}</p>
                        </div>
                    </div>
                </div>
            @endif            

            <h1 id='header-readest-news' class='page-header'>      
                @lang('user.readest_news')
            </h1>
            @foreach ($readestNews as $key => $element)
                @if ($key == 0)
                     <div class='row-item row'>
                        <div class='col-lg-12 col-sm-12 col-md-12'>
                            <div class='icon-slide-container'>
                                <a href="{{ route('news.show', $element->id) }}">
                                    <img src="{{ $element->title_image }}"
                                        class='img-responsive slide-icon img-thumbnail' 
                                        title="{{ $element->title }}" alt="{{ $element->title }}">
                                </a>
                            </div>
                            <div class='title-time-ago'>
                                <abbr class='timeago' title="{{ $element->created_at }}"></abbr>
                            </div>
                            <a href="{{ route('news.show', $element->id) }}"><b>{{ $element->title }}</b></a>
                            <p class='marg'>{{ $element->description }}</p>
                         </div>
                    </div>
                    <div class='space20'></div>
                @else
                    <div class='col-lg-6 col-sm-6 col-md-6 col-xs-6'>
                        <div class='icon-slide-container'>
                            <a href="{{ route('news.show', $element->id) }}">
                                <img src="{{ $element->title_image }}"
                                    class='img-responsive slide-icon img-thumbnail'
                                    title="{{ $element->title }}" alt="{{ $element->title }}">
                            </a>
                        </div>
                        <div class='title-time-ago'>
                            <abbr class='timeago' title="{{ $element->created_at }}"></abbr>
                        </div>
                        <div class='title-readest-news'>
                            <a href="{{ route('news.show', $element->id) }}"><b>{{ $element->title }}</b>
                        </div> 
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <script type='text/javascript' src="{{ asset('user_asset/customs/js/home.js') }}"></script>
@stop

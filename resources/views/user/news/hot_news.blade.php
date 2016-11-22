<h3 class='page-header margin-top0-imp'><a href=''>@lang('news.hot_news')</a></h3>
@foreach ($hotNews as $key => $element)
    <div class='icon-slide-container'>
        <a href="{{ route('news.show', $element->id) }}">
            <img src='{{ $element->title_image }}' class='img-responsive slide-icon img-thumbnail'
                title='{{ $element->title }}' alt='{{ $element->title }}'>
        </a>
    </div>
    <div class='space10'></div>
    <p class='marg'>
        <a href="{{ route('news.show', $element->id) }}">{{ $element->title }}</a>
    </p>
    <div class='break'></div>
    <div class='space10'></div>
@endforeach

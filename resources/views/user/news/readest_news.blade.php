<h3 class='page-header margin-top10-imp'><a href=''>@lang('news.readest_news')</a></h3>
@foreach ($readestNews as $key => $element)
    @if ($key == 0)
        <div class='row-item row'>
            <div class='col-lg-12 col-sm-12 col-md-12'>
                <div class='icon-slide-container'>
                    <a href="{{ route('news.show', $element->id) }}">
                        <img src='{{ $element->title_image }}' class='img-responsive slide-icon img-thumbnail'>
                    </a>
                </div>
                <div class='news-list-title-time-ago'>
                    <abbr class='timeago' title='{{ $element->created_at }}'></abbr>
                </div>
                <h4>
                    <a href="{{ route('news.show', $element->id) }}">
                        <b>{{ $element->title }}</b>
                    </a>
                </h4>
                <p class='marg'>{{ $element->description }}</p>
            </div>
        </div>
    @else
        <div class='col-lg-12 col-sm-12 col-md-12 col-xs-12'>        
            <div class='margin-top10'>
                <a href="{{ route('news.show', $element->id) }}">{{ $element->title }}</a>
            </div>
            <div class='title-time-ago margin-top5'>
                <abbr class='timeago' title='{{ $element->created_at }}'></abbr>
            </div>
            <div class="break"></div>
        </div>
    @endif
@endforeach

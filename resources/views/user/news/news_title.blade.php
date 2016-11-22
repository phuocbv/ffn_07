<div class='row'> 
    @foreach ($titleNews as $key => $element)
        @if ($key == 0)
            <div class='col-lg-8 col-sm-12 col-md-8 col-xs-12'>
                <div class='icon-slide-container'>
                    <a href="{{ route('news.show', $element->id) }}">
                        <img src='{{ $element->title_image }}'
                            class='img-responsive slide-icon'
                            title='{{ $element->title }}' alt='{{ $element->title }}'>
                    </a>
                </div>
                
                <h4>
                    <a href="{{ route('news.show', $element->id) }}">
                        <b>{{ $element->title }}</b>
                    </a>
                </h4>
                <div class='title-time-ago'>
                    <abbr class='timeago' title='{{ $element->created_at }}'></abbr>
                </div>
                <p class='marg'>{{ $element->description }}</p>
            </div>
            <div class='col-md-4'>
            @if (count($titleNews) == 1)
                </div>
            @endif
        @else
            <div class='row display-title'>
                <div class='col-md-6 col-xs-4'>
                    <a href="{{ route('news.show', $element->id) }}">
                        <img class='img-responsive' src='{{ $element->title_image }}'>
                    </a>
                </div>
                <div class='space5'></div>
                <div class='col-md-6 col-sm-12 col-xs-8 row'>
                    <a href="{{ route('news.show', $element->id) }}">
                        {{ MyFuncs::handleTitle($element->title, 8) }}
                    </a>
                </div>
                <div class='title-time-ago col-md-6 col-sm-9 col-xs-8 row'>
                    <abbr class='timeago' title='{{ $element->created_at }}'></abbr>
                </div>
            </div>

            <div class='col-xs-6 col-sm-6 hidden-title'>
                <div class='thumbnail'>
                    <a href="{{ route('news.show', $element->id) }}">
                        <img src='{{ $element->title_image }}' class='img-responsive slide-icon'>
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
                            <abbr class='timeago' title='{{ $element->created_at }}'></abbr>
                        </p>
                    </div>
                </div>
            </div>
            @if ($key == count($titleNews) - 1)
                </div>
            @endif
        @endif
    @endforeach
</div>

<div class='row col-md-12'>
    <div class='space20'></div>
    <div class='row'>
        @foreach ($ortherNews as $key => $element)
            <div class='col-xs-6 col-sm-6 col-lg-3 col-md-3'>
                <div class='thumbnail'>
                    <a href="{{ route('news.show', $element->id) }}">
                        <img src='{{ $element->title_image }}' class='img-responsive slide-icon'>
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
                            <abbr class='timeago' title='{{ $element->created_at }}'></abbr>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

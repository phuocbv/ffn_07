<nav class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
    <div class='container'>
        <div class='navbar-header'>
            <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
                <span class='sr-only'>Toggle navigation</span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
            </button>
            <a class='navbar-brand' href="{{ route('home') }}">@lang('user.home')</a>
        </div>
        <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
            <ul class='nav navbar-nav navbar-right'>
                @foreach ($categories as $key => $element)
                    <li>
                        <a href="{{ route('news-category.show', $element->id) }}">{{ $element->name }}</a>
                    </li>
                @endforeach
                <li class='dropdown'>
                    <a href='javascript:void(0)' class='dropdown-toggle' data-toggle='dropdown'>
                        @lang('user.ranks') <b class='caret'></b>
                    </a>
                    <ul class='dropdown-menu'>
                        @foreach ($leaguesList as $key => $element)
                            <li class='dropdown dropdown-submenu'>
                                <a href='' class='dropdown-toggle' data-toggle='dropdown'>{{ $element->name }}</a>
                                <ul class='dropdown-menu'>
                                    @foreach ($element->leagueSeasons as $key => $value)
                                        <li><a href="{{ route('showCharts', $value->id) }}">{{ $value->year }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class='dropdown'>
                    <a href='javascript:void(0)' class='dropdown-toggle' data-toggle='dropdown'>
                        @lang('user.schedule') <b class='caret'></b>
                    </a>   
                    <ul class='dropdown-menu'>
                        @foreach ($leaguesList as $key => $element)
                            <li class='dropdown dropdown-submenu'>
                                <a href='' class='dropdown-toggle' data-toggle='dropdown'>{{ $element->name }}</a>
                                <ul class='dropdown-menu'>
                                    @foreach ($element->leagueSeasons as $key => $value)
                                        <li><a href="{{ route('showMatch', $value->id) }}">{{ $value->year }}</a></li>
                                    @endforeach  
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class='dropdown'>
                    <a href='javascript:void(0)' class='dropdown-toggle' data-toggle='dropdown'>
                        @lang('user.result') <b class='caret'></b>
                    </a>
                    <ul class='dropdown-menu'>
                        @foreach ($leaguesList as $key => $element)
                            <li class='dropdown dropdown-submenu'>
                                <a href='' class='dropdown-toggle' data-toggle='dropdown'>{{ $element->name }}</a>
                                <ul class='dropdown-menu'>
                                    @foreach ($element->leagueSeasons as $key => $value)
                                        <li><a href="{{ route('showMatchResult', $value->id) }}">{{ $value->year }}</a></li>
                                    @endforeach  
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class='dropdown'>
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">@lang('login.login')</a></li>
                        <li><a href="{{ url('/register') }}">@lang('login.register')</a></li>
                    @else
                        <li class='dropdown'>
                            <a href='' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'>
                                {{ Auth::user()->name }} <span class='caret'></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('users.edit', Auth::user()) }}"><i class="fa fa-btn fa-edit"> @lang('text.admin_profile')</i></a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> @lang('login.logout')</a></li>
                            </ul>
                        </li>
                    @endif
                </li>
            </ul>
        </div>   
    </div>
</nav>

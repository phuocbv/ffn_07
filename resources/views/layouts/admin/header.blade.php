<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">@lang('text.admin_toggle_navigation')</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">@lang('text.home_title')</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            @if (Auth::guest())
            <li><a href="{{ url('/login') }}">@lang('text.admin_log_in')</a></li>
            <li><a href="{{ url('/register') }}">@lang('text.admin_register')</a></li>
            @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class ="glyphicon glyphicon-user"></span>{{ Auth::user()->name }}<b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ url('/profile') }}">@lang('text.admin_profile')</a>
                    </li>
                    <li>
                        <a href="{{ url('/logout') }}">@lang('text.admin_log_out')</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    @include('layouts.admin.menu')
</nav>

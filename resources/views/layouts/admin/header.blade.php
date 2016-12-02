<nav class='navbar navbar-default navbar-static-top' role='navigation'>
    <div class='navbar-header'>
        <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
            <span class='sr-only'>@lang('text.admin_toggle_navigation')</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
        </button>
        <a class='navbar-brand' href="{{ url('/home') }}">@lang('text.home_title')</a>
    </div>
    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
        <ul class='nav navbar-nav navbar-right'>
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">@lang('login.login')</a></li>
                <li><a href="{{ url('/register') }}">@lang('login.register')</a></li>
            @else
                <li class='dropdown'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'>
                        {{ Auth::user()->name }} <span class='caret'></span>
                    </a>

                    <ul class='dropdown-menu' role='menu'>
                        <li><a href="{{ route('users.edit', Auth::user()) }}"><i class='fa fa-btn fa-edit'>@lang('text.admin_profile')</i></a></li>
                        <li><a href="{{ url('/logout') }}"><i class='fa fa-btn fa-sign-out'></i>@lang('login.logout')</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
    @include('layouts.admin.menu')
</nav>

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    {{--    {{Html::style('css2/bootstrap.css')}}--}}
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset(elixir('css/app-style.css')) }}">

{{--    <link href="{{ asset('build/css/app-style-f1210665df.css') }}" rel="stylesheet">--}}

    {{--<script src="https://code.jquery.com/jquery-2.2.4.min.js"--}}
            {{--integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>--}}
    {{--<link href="{{ asset('content/bootstrap/js/bootstrap.js') }}" rel="stylesheet">--}}
{{--    {{Html::script('content/bootstrap/js/bootstrap.js')}}--}}

    @yield('styles')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Branding Image -->
        {!! link_to_route('/','AUTH',[],['class'=>'navbar-brand']) !!}
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown link
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>

            </ul>
        <ul class="nav navbar-nav">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li class="nav-item pull-right"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item pull-right"><a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            @endif
        </ul>
    </nav>

    <div class="container-fluid" style="padding-top: 15px;">
        @yield('content')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="{{ asset(elixir('js/app.js')) }}"></script>
    @yield('scripts')
</div>
</body>
</html>
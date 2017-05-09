<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8"/>
    <meta name="_token" content="<?php echo csrf_token(); ?>">
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
    <div class="engineer-header">
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarTogglerDemo01"
                    aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                    @if (!Auth::guest())
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('operation_journal')}}">Оперативный журнал <span
                                        class="sr-only">(current)</span></a>
                        </li>
                        @if (Auth::user()->hasRole('admin'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin')}}">Админка <span
                                            class="sr-only">(current)</span></a>
                            </li>
                        @endif
                    @endif
                    {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Link</a>--}}
                    {{--</li>--}}
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
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>

        </nav>
    </div>


    <div class="container-fluid" style="padding-top: 15px;">
        @yield('content')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="{{ asset(elixir('js/app.js')) }}"></script>
    @yield('scripts')
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8"/>
    <meta name="_token" content="<?php echo csrf_token(); ?>">
    <title>@yield('title')</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset(elixir('css/app-style.css')) }}">
    @yield('styles')
</head>
<body>
<div id="app">
    {{--<a class="col-md-2 col-sm-3" style="text-align: center; font-size: 28px; font-weight: bolder;">Admin</a>--}}
    <div class="admin-header">
        <nav class="navbar navbar-toggleable-sm navbar-inverse bg-inverse">
            <div class="navbar-header visible">
                <a class="navbar-brand " href="{{route('admin')}}">
                    <i class="fa fa-home"></i> Панель администрирования
                </a>
            </div>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarTogglerDemo01"
                    aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    {{--<li class="nav-item active">--}}
                    {{--<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Link</a>--}}
                    {{--</li>--}}
                </ul>
                <ul class="navbar-nav align-self-end">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('/')}}">Назад на сайт</a>
                    </li>
                    <li class="nav-item dropdown d-block pull-right">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-sm-3 left-sidebar">
                <ul class="nav nav-sidebar d-block">
                    <li class="{{ Request::is('user*') ? 'active' : '' }}">
                        <a href="{{route('user.index')}}">
                            <i class="fa fa-user-circle" title="Пользователи"></i>
                            <span class="title-link">Пользователи</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('settings*') ? 'active' : '' }}">
                        <a href="{{route('settings.index')}}">
                            <i class="fa fa-cog" title="Настройки"></i>
                            <span class="title-link">Настройки</span>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-sidebar d-block">
                    <li class="{{ Request::is('object') || Request::is('object\*') ? 'active' : '' }}">
                        <a href="{{route('object.index')}}">
                            <i class="fa fa-folder-o" title="Объекты"></i>
                            <span>Объекты</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('object-type*') ? 'active' : '' }}">
                        <a href="{{route('object-type.index')}}">
                            <i class="fa fa-folder-o" title="Типы объектов"></i>
                            <span>Типы объектов</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('issue*') ? 'active' : '' }}">
                        <a href="{{route('issue.index')}}">
                            <i class="fa fa-folder-o" title="Виды работ / неисправностей"></i>
                            <span>Виды работ / неисправностей</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('staff*') ? 'active' : '' }}">
                        <a href="{{route('staff.index')}}">
                            <i class="fa fa-folder-o" title="Персонал"></i>
                            <span>Персонал</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 offset-md-2 col-sm-9 offset-sm-3 wrapper-content-admin">
                <div class="row">
                    <div class="col-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/tether.1.4.0.min.js') }}"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>--}}
    <script src="{{ asset(elixir('js/app.js')) }}"></script>
    @yield('scripts')
</div>
</body>
</html>
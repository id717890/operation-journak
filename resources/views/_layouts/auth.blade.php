<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset(elixir('css/app-style.css')) }}">
    @yield('styles')
</head>
<body style="background-color: #e6ecf2">
@yield('content')
<script src="{{ asset('js/tether.1.4.0.min.js') }}"></script>
<script src="{{ asset(elixir('js/app.js')) }}"></script>
@yield('scripts')
</body>
</html>
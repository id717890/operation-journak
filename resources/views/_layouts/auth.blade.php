<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset(elixir('css/app-style.css')) }}">
</head>
<body style="background-color: #2c3338">
@yield('content')
</body>
</html>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css','resources/js/toggleView.js'])
  <title>@yield('title','Bienvenido')</title>
</head>
<body>

    @yield('content')
</body>
</html>
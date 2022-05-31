<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>symbols</title>

    <!-- CSS only -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

</head>
<body>
    <div class="container-fluid">
        @yield('content')
    </div>
</body>
</html>
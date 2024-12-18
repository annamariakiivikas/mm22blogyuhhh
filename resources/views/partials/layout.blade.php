<!DOCTYPE html>
<html lang="en" data-theme="autumn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    @include('partials.nav')
    <div class="container mx-auto">
        @yield('content')
    </div>
</body>
</html>

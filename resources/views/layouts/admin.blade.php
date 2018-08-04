<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Denis Mitrofanov') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="w-full">
<div id="app" class="w-full">
    <header class="w-full fixed">
        <div class="bg-grey-dark py-3">
            <div class="container mx-auto">
                <div class="bg-grey-dark flex justify-between text-orange">
                        <span>
                            Админ панель
                        </span>
                        <span>{{ config('app.url') }}</span>
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</div>
</body>
</html>

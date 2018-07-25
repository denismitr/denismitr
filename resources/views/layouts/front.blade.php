<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header class="w-full">
            <div class="bg-grey-dark py-3">
                <div class="container mx-auto">
                    <div class="bg-grey-dark flex justify-between text-orange">
                        <span>
                            <span class="mr-2">{{ __('My personal website') }}</span>
                            <locale-select locale="{{ app()->getLocale() }}"></locale-select>
                        </span>
                        <span>{{ business('email') }}</span>
                    </div>
                </div>
            </div>
            <nav class="flex items-center justify-between flex-wrap p-6 bg-white">
                <div class="container mx-auto">
                    <a class="navbar-brand" href="#">
                        <span class="text-danger">{{ business('first_name') }}</span>
                        <span>{{ business('last_name') }}</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('front.home') }}">{{ __('Home') }} <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('front.projects') }}">{{ __('Projects') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('front.tech') }}">{{ __('Tech stack') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('front.blog') }}">{{ __('Blog') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('front.contact') }}">{{ __('Contact') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

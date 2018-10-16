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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header>
            <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
                <div class="navbar-brand">
                    <a class="navbar-item" href="{{ route('front.home') }}">
                        <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
                    </a>

                    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                </div>

                <div id="nav" class="navbar-menu">
                    <div class="navbar-start">
                        <a href="{{ route('front.home') }}" class="navbar-item">
                            Landing page
                        </a>

                        <a href="{{ route('admin.dashboard') }}" class="navbar-item">
                            Dashboard
                        </a>

                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">
                                Personal details
                            </a>

                            <div class="navbar-dropdown">
                                <a href="{{ route('admin.dashboard') }}" class="navbar-item">
                                    Business details
                                </a>
                                <a href="{{ route('admin.security.show') }}" class="navbar-item">
                                    Security
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="navbar-end">
                        <div class="navbar-item">
                            <form action="{{ route('logout') }}" method="POST" class="buttons">
                                @csrf
                                <button class="button is-primary">
                                    <strong>Logout</strong>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <div class="section">
            <div class="container">
                <div class="columns">
                    <div class="column is-3">
                        @auth
                        <div class="card">
                            <div class="card-content">
                                <div class="menu">
                                    <p class="menu-label">
                                        Personal details
                                    </p>
                                    <ul class="menu-list">
                                        <li>
                                            <a href="{{ route('admin.dashboard') }}">Business details</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.security.show') }}">Security</a>
                                        </li>
                                    </ul>
                                    <p class="menu-label">
                                        Administration
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endauth
                    </div>
                    <div class="column">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

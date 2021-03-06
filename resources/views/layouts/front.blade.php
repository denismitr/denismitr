<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Denis Mitrofanov') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="w-full">
    <div id="app" class="w-full">
        <header class="w-full">
            <div class="bg-grey-dark py-3">
                <div class="container mx-auto">
                    <div class="bg-grey-dark flex justify-between text-orange">
                        <span>
                            <span class="mr-2">{{ __('My personal website') }}</span>
                            <locale-select locale="{{ app()->getLocale() }}"></locale-select>
                        </span>
                        <span>{{ $business->email }}</span>
                    </div>
                </div>
            </div>
            <div class="container mx-auto">
                <nav class="flex items-center justify-between px-5 bg-white flex-wrap">
                    <h1 class="flex items-center flex-no-shrink text-2xl mr-6 my-0 p-3">
                        <a class="text-grey no-underline" href="{{ route_lang('front.home') }}">
                            <span class="text-red">{{ $business->getFirstName() }}</span>
                            <span class="text-grey">{{ $business->getLastName() }}</span>
                        </a>
                    </h1>
    
                    <div class="md:hidden">
                        <button @click="menuVisible = !menuVisible" class="flex items-center px-3 py-2 border rounded text-teal-lighter border-teal-light hover:text-white hover:border-white">
                            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Menu</title>
                                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                            </svg>
                        </button>
                    </div>
                        
                    <div :class="menuClasses" class="w-flow flex-grow md:flex md:items-center w-full md:w-auto lg:w-auto" role="menu">
                        <div class="md:w-full text-sm md:flex justify-end">
                            <a role="menuitem" class="mt-4 py-7 px-4 text-grey block md:inline-block md:mt-0 hover:text-white hover:bg-red" href="{{ route_lang('front.home') }}">{{ __('Home') }}</a>
                            <a role="menuitem" class="mt-4 py-7 px-4 text-grey block md:inline-block md:mt-0 hover:text-white hover:bg-red" href="{{ route_lang('front.projects') }}">{{ __('Projects') }}</a>
                            <a role="menuitem" class="mt-4 py-7 px-4 text-grey block md:inline-block md:mt-0 hover:text-white hover:bg-red" href="{{ route_lang('front.blog') }}">@lang('blog.menu')</a>
                            <a role="menuitem" class="mt-4 py-7 px-4 text-grey block md:inline-block md:mt-0 hover:text-white hover:bg-red" href="{{ route_lang('front.contact') }}">{{ __('Contact') }}</a>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <main>
            @yield('keyboard')
            @yield('content')
        </main>

        <footer class="flex justify-center content-center border-t-4 border-red-dark bg-grey-darkest py-16">
            <div class="text-center w-full">
                <strong class="text-orange">&COPY; 2016 - {{ date('Y') }} @lang('text.name')</strong>
            </div>
        </footer>
    </div>
</body>
</html>

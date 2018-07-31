@extends('layouts.front')

@section('keyboard')
<div class="w-full">
    <figure class="w-full">
        <img class="h-auto w-full shadow" src="{{ asset('img/header-bg.jpg') }}" alt="Keyboard">
    </figure>
</div>
@endsection

@section('content')
<div class="w-full bg-grey-light">
    <article class="container mx-auto py-7">
        <h2 class="border-b-2 border-white border-solid py-2 mb-3 text-grey text-4xl">{{ __('About') }} <span class="text-red">{{ __('Me') }}</span></h2>
        <p class="mb-2">
            Hi, I'm a Software Engineer from Moscow. I learned programming years ago, when I was a kid.
            And for the last 5 years I work as a full-stack web developer.
            I'm rather agnostic when it comes to programming languages, frameworks and tools, however I've got my own favorites
            and those are PHP 7, Python 3 and Elixir. I love working with modern frameworks like Laravel, Django and Phoenix.
        </p>
        <p>
            Currently I'm working at <a class="text-red hover:text-red-dark" target="_blank" href="https://amazingecommelite.com">EcommElite</a>.
        </p>
    </article>
</div>
<div class="w-full bg-grey-light">
    <article class="container mx-auto py-7">
        @if(app()->isLocale('ru'))
            <h3 class="border-b-2 border-white border-solid py-2 mb-6 text-grey text-4xl">
                Создание <span class="text-red">WEB</span> сервисов и <span class="text-red">SAAS</span> приложений
            </h3>
        @else
            <h3 class="border-b-2 border-white border-solid py-2 mb-6 text-grey text-4xl">
                Building <span class="text-red">web services</span> and <span class="text-red">SAAS applications</span>
            </h3>
        @endif
        <div class="flex mb-4">
            <div class="w-1/3 px-2">
                <div class="max-w-sm overflow-hidden">
                    <h4 class="mb-3">
                        <a class="text-indigo-darker text-3xl hover:text-indigo-dark" href="{{ route('front.projects') }}">
                            {{ __('Projects') }}
                        </a>
                    </h4>
                    <a class="block mb-3" href="{{ route('front.projects') }}">
                        <img src="{{ asset('img/projects.jpg') }}" alt="{{ __('Projects') }}">
                    </a>
                    <p>
                        @lang('text.about_projects')
                    </p>
                </div>
            </div>
            <div class="w-1/3 px-2">
                <div class="max-w-sm overflow-hidden">
                    <h4 class="mb-3">
                        <a class="text-indigo-darker text-3xl hover:text-indigo-dark" href="{{ route('front.tech') }}">
                            {{ __('Technologies') }}
                        </a>
                    </h4>
                    <a class="block mb-3" href="{{ route('front.tech') }}">
                        <img src="{{ asset('img/mytechnologies.jpg') }}" alt="{{ __('Technologies') }}">
                    </a>
                    <p>
                        @lang('text.about_technologies')
                    </p>
                </div>
            </div>
        </div>
    </article>
</div>
@endsection

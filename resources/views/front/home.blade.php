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
        <p>
            Hi, I'm a Software Engineer from Moscow. I learned programming years ago, when I was a kid.
            And for the last 5 years I work as a full-stack web developer.
            I'm rather agnostic when it comes to programming languages, frameworks and tools, however I've got my own favorites
            and those are PHP 7, Python 3 and Elixir. I love working with modern frameworks like Laravel, Django and Phoenix.
        </p>
        <p>
            I work for EcommElite.
        </p>
    </article>
</div>
@endsection

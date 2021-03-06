@extends('layouts.front')

@section('keyboard')
    @include('front.components._keyboard')
@endsection

@section('content')
    <section class="w-full min-h-full">
        <div class="container mx-auto py-2 mb-20">
            <div class="flex flex-wrap md:flex-row-reverse mb-4">
                @include('front.blog.aside')

                <div class="w-full md:w-2/3 lg:w-2/3">
                    <article class="mb-20">
                        @if(app()->isLocale('ru'))
                            <h1 class="border-b border-grey-light border-solid py-2 mt-2 mb-2 text-grey text-3xl font-sans">
                                Темы <span class="text-red">моего</span> блога
                            </h1>
                        @else
                            <h1 class="border-b border-grey-light border-solid py-2 mt-2 mb-2 text-grey text-3xl font-sans">
                                My <span class="text-red">blog</span> topics
                            </h1>
                        @endif

                        <div>
                            @foreach($topics as $topic)
                                <h5 class="mb-2 text-red">
                                    <strong>&mdash;</strong>&nbsp;
                                    <a class="text-red hover:text-red-darker hover:underline text-lg" href="{{ route('front.blog.topic', $topic->slug) }}" title="{{ $topic->name }}">
                                        {{ $topic->name }}
                                    </a>
                                </h5>
                            @endforeach
                        </div>
                    </article>

                    <article>
                        @if(app()->isLocale('ru'))
                            <h2 class="border-b border-grey-light border-solid py-2 mt-2 mb-2 text-grey text-3xl font-sans">
                                Статьи <span class="text-red">моего</span> блога
                            </h2>
                        @else
                            <h2 class="border-b border-grey-light border-solid py-2 mt-2 mb-2 text-grey text-3xl font-sans">
                                My <span class="text-red">blog</span> articles
                            </h2>
                        @endif

                        @include('front.blog._posts')
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.front')

@section('keyboard')
    @include('front.components._keyboard')
@endsection

@section('content')
    <section class="w-full min-h-full">
        <div class="container mx-auto py-2 mb-20">
            <div class="flex mb-4">
                <div class="w-full md:w-2/3">
                    <article class="mb-20">
                        @if(app()->isLocale('ru'))
                            <h3 class="border-b border-grey-light border-solid py-2 mt-2 mb-2 text-grey text-3xl font-sans">
                                Темы <span class="text-red">моего</span> блога
                            </h3>
                        @else
                            <h3 class="border-b border-grey-light border-solid py-2 mt-2 mb-2 text-grey text-3xl font-sans">
                                My <span class="text-red">blog</span> topics
                            </h3>
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
                            <h3 class="border-b border-grey-light border-solid py-2 mt-2 mb-2 text-grey text-3xl font-sans">
                                Статьи <span class="text-red">моего</span> блога
                            </h3>
                        @else
                            <h3 class="border-b border-grey-light border-solid py-2 mt-2 mb-2 text-grey text-3xl font-sans">
                                My <span class="text-red">blog</span> articles
                            </h3>
                        @endif

                        @foreach($posts as $post)
                            <div class="mb-4">
                                <h4 class="text-red text-xl font-italic mb-4">
                                    <strong>&mdash;</strong>
                                    &nbsp;
                                    {{ $post->name }}
                                </h4>

                                <p class="text-grey mb-3">{{ $post->human_date }} | {{ $post->topic_names }}</p>
                                <p>{{ $post->description(130) }}</p>
                            </div>
                        @endforeach
                    </article>
                </div>

                @include('front.blog.aside')
            </div>
        </div>
    </section>
@endsection

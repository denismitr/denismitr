@extends('layouts.front')

@section('keyboard')
    @include('front.components._keyboard')
@endsection

@section('content')
    <section class="w-full min-h-full">
        <div class="container mx-auto py-2 mb-20">
            <div class="flex mb-4">
                <div class="w-full md:w-2/3">
                    <article>
                        @if(app()->isLocale('ru'))
                            <h1 class="border-b border-grey-light border-solid py-2 mt-2 mb-2 text-grey text-3xl font-sans">
                                Результаты <span class="text-red">поиска</span>
                            </h1>
                        @else
                            <h1 class="border-b border-grey-light border-solid py-2 mt-2 mb-2 text-grey text-3xl font-sans">
                                Search <span class="text-red">results</span>
                            </h1>
                        @endif

                        @foreach($posts as $post)
                            <div class="mb-4">
                                <h4 class="text-red text-xl font-italic mb-4">
                                    <strong>&mdash;</strong>
                                    &nbsp;
                                    <a class="text-red hover:text-red-darker" href="{{ route('front.blog.post', $post->getRouteKey()) }}">{{ $post->name }}</a>
                                    @if($post->hasParts())
                                        &nbsp;
                                        &nbsp;
                                        [
                                        <a class="text-red hover:text-red-darker text-sm" href="{{ route('front.blog.post', $post->getRouteKey()) }}">part 1</a>,
                                        @foreach($post->parts as $part)
                                            &nbsp;<a class="text-red hover:text-red-darker text-sm" href="{{ route('front.blog.post', $part->getRouteKey()) }}">part {{ $part->part }}</a>
                                            @unless($loop->last)
                                                ,
                                            @endunless
                                        @endforeach
                                        ]
                                    @endif
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

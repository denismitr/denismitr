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
                        <h1 class="border-b border-grey-light border-solid py-2 mt-2 mb-2 text-grey text-3xl font-sans">
                            {{ $topic->name }}
                        </h1>
                        <a href="{{ route('front.blog') }}" class="block py-2 mt-2 mb-6 text-grey text-xl font-sans">
                            @lang('blog.back')
                        </a>

                        @include('front.blog._posts')
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection

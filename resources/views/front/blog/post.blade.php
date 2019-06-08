@extends('layouts.front')

@section('title', $post->name)

@section('keyboard')
    @include('front.components._keyboard')
@endsection

@section('content')
    <section class="w-full min-h-full">
        <div class="container mx-auto py-2 mb-20">
            <div class="flex mb-4">
                <div class="w-full md:w-2/3">
                    <article>
                        <h1 class="border-b border-grey-light border-solid py-2 mt-2 mb-2 text-grey text-3xl font-sans">
                            {!!  present_post_title($post->name) !!}
                        </h1>

                        @include('front.blog._parts')

                        <p>
                            {!! present_post_body($post->body) !!}
                        </p>
                    </article>
                </div>

                @include('front.blog.aside')
            </div>
        </div>
    </section>
@endsection
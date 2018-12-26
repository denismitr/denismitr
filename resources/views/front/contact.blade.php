@extends('layouts.front')

@section('keyboard')
    @include('front.components._keyboard')
@endsection

@section('content')
    <div class="w-full min-h-full">
        <article class="container mx-auto py-2">
            <div class="mx-auto max-w-md">
                <p class="text-center mt-10 mb-10">
                    <svg class="fill-current text-yellow-darker inline-block h-24 w-24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M18 2a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4c0-1.1.9-2 2-2h16zm-4.37 9.1L20 16v-2l-5.12-3.9L20 6V4l-10 8L0 4v2l5.12 4.1L0 14v2l6.37-4.9L10 14l3.63-2.9z"/>
                    </svg>
                </p>
                @if(app()->isLocale('ru'))
                    <h3 class="border-b border-grey-light border-solid py-2 mt-2 mb-2 text-grey text-4xl font-sans">
                        <span class="text-red">Связаться</span> со мной
                    </h3>
                @else
                    <h3 class="border-b border-grey-light border-solid py-2 mt-2 mb-2 text-grey text-4xl font-sans">
                        Get in <span class="text-red">contact</span> with me
                    </h3>
                @endif
            </div>
        </article>
        <section class="w-full py-5">
            <div class="container mx-auto py-2 mb-20">
                <contact-form lang="{{ app()->getLocale() }}" :sent="{{ $sent ? 'true' : 'false' }}"></contact-form>
            </div>
        </section>
    </div>
@endsection

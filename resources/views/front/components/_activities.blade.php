<div class="w-full bg-grey-light">
    <article class="container mx-auto py-7">
        <h3 class="border-b-2 border-white border-solid py-2 mb-6 text-grey text-4xl">
            @lang('text.activities.title')
        </h3>
        <div class="flex mb-4">
            <div class="w-1/3 px-3">
                <div class="max-w-sm overflow-hidden">
                    <h4 class="mb-3">
                        <a class="text-indigo-darker text-3xl hover:text-indigo-dark" href="{{ route_lang('front.projects') }}">
                            @lang('text.activities.projects.title')
                        </a>
                    </h4>
                    <a class="block mb-3" href="{{ route_lang('front.projects') }}">
                        <img src="{{ asset('img/projects.jpg') }}" alt="@lang('text.activities.projects.title')">
                    </a>
                    <p class="text-justify">
                        @lang('text.activities.projects.content')
                    </p>
                </div>
            </div>
            <div class="w-1/3 px-3">
                <div class="max-w-sm overflow-hidden">
                    <h4 class="mb-3">
                        <a class="text-indigo-darker text-3xl hover:text-indigo-dark" href="{{ route_lang('front.tech') }}">
                            @lang('text.activities.technologies.title')
                        </a>
                    </h4>
                    <a class="block mb-3" href="{{ route_lang('front.tech') }}">
                        <img src="{{ asset('img/mytechnologies.jpg') }}" alt="@lang('text.activities.technologies.title')">
                    </a>
                    <p class="text-justify">
                        @lang('text.activities.technologies.content')
                    </p>
                </div>
            </div>
            <div class="w-1/3 px-3">
                <div class="max-w-sm overflow-hidden">
                    <h4 class="mb-3">
                        <a class="text-indigo-darker text-3xl hover:text-indigo-dark" href="{{ route_lang('front.blog') }}">
                            @lang('text.activities.blog.title')
                        </a>
                    </h4>
                    <a class="block mb-3" href="{{ route_lang('front.blog') }}">
                        <img src="{{ asset('img/myblog.jpg') }}" alt="@lang('text.activities.blog.title')">
                    </a>
                    <p class="text-justify">
                        @lang('text.activities.blog.content')
                    </p>
                </div>
            </div>
        </div>
    </article>
</div>
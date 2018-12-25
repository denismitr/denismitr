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
            <div class="w-1/3 px-3">
                <div class="max-w-sm overflow-hidden">
                    <h4 class="mb-3">
                        <a class="text-indigo-darker text-3xl hover:text-indigo-dark" href="{{ route('front.projects') }}">
                            {{ __('Projects') }}
                        </a>
                    </h4>
                    <a class="block mb-3" href="{{ route('front.projects') }}">
                        <img src="{{ asset('img/projects.jpg') }}" alt="{{ __('Projects') }}">
                    </a>
                    <p class="text-justify">
                        @lang('text.about_projects')
                    </p>
                </div>
            </div>
            <div class="w-1/3 px-3">
                <div class="max-w-sm overflow-hidden">
                    <h4 class="mb-3">
                        <a class="text-indigo-darker text-3xl hover:text-indigo-dark" href="{{ route('front.tech') }}">
                            {{ __('Technologies') }}
                        </a>
                    </h4>
                    <a class="block mb-3" href="{{ route('front.tech') }}">
                        <img src="{{ asset('img/mytechnologies.jpg') }}" alt="{{ __('Technologies') }}">
                    </a>
                    <p class="text-justify">
                        @lang('text.about_technologies')
                    </p>
                </div>
            </div>
            <div class="w-1/3 px-3">
                <div class="max-w-sm overflow-hidden">
                    <h4 class="mb-3">
                        <a class="text-indigo-darker text-3xl hover:text-indigo-dark" href="{{ route('front.blog') }}">
                            @lang('blog.menu')
                        </a>
                    </h4>
                    <a class="block mb-3" href="{{ route('front.blog') }}">
                        <img src="{{ asset('img/myblog.jpg') }}" alt="@lang('blog.menu')">
                    </a>
                    <p class="text-justify">
                        @lang('text.about_blog')
                    </p>
                </div>
            </div>
        </div>
    </article>
</div>
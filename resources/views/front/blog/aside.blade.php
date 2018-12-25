<aside class="w-full md:w-1/3 lg:w-1/3">
    <div class="w-full mt-12">
        <figure class="text-center w-full p-10">
            <img class="max-w-full border-3 border-grey-soft mb-5" src="{{ asset('img/gravatar.jpg') }}" alt="Denis Mitrofanov">
            <figcaption>
                <a class="text-red hover:text-red-dark" href="https://twitter.com/denis_mitr">@denis_mitr</a>
            </figcaption>
        </figure>
    </div>
    <div class="w-full mt-6 p-4">
        <form action="{{ route('front.blog.search') }}" method="GET">
            <div class="mb-4">
                <input type="text" name="q" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" id="q" placeholder="@lang('blog.search.placeholder')">
            </div>
            <div class="text-center">
                <button class="shadow bg-red-dark hover:bg-red focus:shadow-outline focus:outline-none text-white font-bold py-3 px-5 rounded" type="submit">@lang('blog.search.button')</button>
            </div>
        </form>
    </div>
</aside>
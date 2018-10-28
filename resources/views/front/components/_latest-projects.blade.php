<div class="w-full bg-grey-light">
    <article class="container mx-auto py-7">
        @if(app()->isLocale('ru'))
            <h3 class="border-b-2 border-white border-solid py-2 mb-6 text-grey text-4xl">
                Мои <span class="text-red">новые</span> проекты
            </h3>
        @else
            <h3 class="border-b-2 border-white border-solid py-2 mb-6 text-grey text-4xl">
                My <span class="text-red">latest</span> projects
            </h3>
        @endif
    </article>
    <section class="w-full">
        <div class="container mx-auto py-5">
            @foreach($projects as $project)
                @include('front.components._project')
            @endforeach
        </div>
    </section>
</div>
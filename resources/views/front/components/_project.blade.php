<article class="w-full lg:flex mb-10">
    <div class="h-48 lg:h-64 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden">
        <img class="max-h-full max-w-full" src="{{ $project->getPicture() }}" alt="{{ $project->name }}">
    </div>
    <div class="border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-6 flex flex-col justify-between leading-normal">
        <div>
            <h3 class="text-black font-bold text-xl mb-2">{{ $project->name }}</h3>
            <p class="text-grey-darker text-base">
                @if(app()->isLocale('ru'))
                    {{ $project->description_ru }}
                @else
                    {{ $project->description_en }}
                @endif
            </p>
        </div>
        <p>
            <a class="bg-transparent hover:bg-red text-red-dark hover:text-white font-semibold py-4 px-4 border border-red-dark hover:border-transparent rounded" href="{{ $project->url }}">
                {{ __('Visit the project URL') }}
            </a>
        </p>
    </div>
</article>
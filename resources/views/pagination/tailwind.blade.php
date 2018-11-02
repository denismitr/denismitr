@if ($paginator->hasPages())
    <ul class="flex list-reset border border-white rounded w-auto font-sans" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="block text-grey-dark bg-transparent border-r border-white px-3 py-2" aria-hidden="true">@lang('pagination.previous')</span>
            </li>
        @else
            <li>
                <a class="block text-grey-dark bg-transparent border-r border-white px-3 py-2" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">@lang('pagination.previous')</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li aria-disabled="true">
                    <span class="block text-grey-dark bg-transparent border-r border-white px-3 py-2">{{ $element }}</span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li aria-current="page">
                            <span class="block text-white bg-red border-r border-white px-3 py-2">{{ $page }}</span>
                        </li>
                    @else
                        <li>
                            <a class="block text-grey-dark hover:text-white hover:bg-red border-r border-white px-3 py-2" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a class="block text-grey-dark bg-transparent border-white px-3 py-2" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">@lang('pagination.next')</a>
            </li>
        @else
            <li aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="block text-grey-dark bg-transparent border-grey px-3 py-2" aria-hidden="true">@lang('pagination.next')</span>
            </li>
        @endif
    </ul>
@endif

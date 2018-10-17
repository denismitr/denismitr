@if ($paginator->hasPages())
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
        @if ($paginator->onFirstPage())
            <a class="pagination-previous">Previous</a>
        @endif
        @if ($paginator->hasMorePages())
            <a class="pagination-next">Next page</a>
        @endif

        <ul class="pagination-list">

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li>
                    <a class="pagination-link is-current" aria-label="Goto page 1">{{ $element }}</a>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li>
                            <a class="pagination-link is-current" aria-label="Goto page 1">{{ $page }}</a>
                        </li>
                    @else
                        <li class="pagination-link">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
    </ul>
</nav>
@endif

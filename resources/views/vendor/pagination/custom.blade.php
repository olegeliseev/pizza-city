@if ($paginator->hasPages())
    <nav class="pagination">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="disabled pagination__item" href="{{ $paginator->previousPageUrl() }}"><span>&lsaquo;</span></a>
        @else
            <a class="pagination__item" href="{{ $paginator->previousPageUrl() }}"><span>&lsaquo;</span></a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="disabled pagination__item" href="{{ $url }}">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="active pagination__item" href="{{ $url }}">{{ $page }}</a>
                    @else
                        <a class="pagination__item" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="pagination__item" href="{{ $paginator->nextPageUrl() }}"><span>&rsaquo;</span></a>
        @else
            <a class="disabled pagination__item" href="{{ $paginator->nextPageUrl() }}"><span>&rsaquo;</span></a>
        @endif
    </nav>
@endif

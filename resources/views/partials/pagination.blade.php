@if ($paginator->hasPages())
        <div class="join my-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button aria-disabled="true" aria-label="@lang('pagination.previous')" class="join-item btn btn-disabled">«</button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="join-item btn">«</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <button aria-disabled="true" class="join-item btn btn-disabled">{{ $element }}</button>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <button aria-current="page" class="join-item btn btn-active">{{ $page }}</button>
                        @else
                            <a href="{{ $url }}" class="join-item btn">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class="join-item btn">»</a>
            @else
                <button aria-disabled="true" aria-label="@lang('pagination.next')" class="join-item btn btn-disabled">»</button>
            @endif
        </div>
@endif

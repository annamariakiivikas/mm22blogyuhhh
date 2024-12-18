@if ($paginator->hasPages())
    <nav class="py-3">
        <ul class="join">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li aria-disabled="true">
                    <span class="join-item btn btn-disabled">«</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="join-item btn" rel="prev">«</a>
                </li>
            @endif

            <li>
                <span class="join-item btn btn-neutral">Page {{ $paginator->currentPage() }}</span>
            </li>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="join-item btn" rel="next">»</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true">
                    <span class="join-item btn">»</span>
                </li>
            @endif
        </ul>
    </nav>
@endif

@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- First Page Link --}}
        <li>
            <a href="{{ $paginator->url(1) }}" aria-label="@lang('pagination.first')">&lsaquo;&lsaquo;</a>
        </li>

        {{-- Previous Page Link --}}
        @if ($paginator->currentPage() > 2)
            <li><a href="{{ $paginator->url($paginator->currentPage() - 1) }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a></li>
        @endif

        {{-- Pages --}}
        @for ($i = max(1, $paginator->currentPage() - 1); $i <= min($paginator->currentPage() + 1, $paginator->lastPage()); $i++)
            <li class="{{ ($i == $paginator->currentPage()) ? 'active' : '' }}">
                <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        {{-- Next Page Link --}}
        @if ($paginator->currentPage() < $paginator->lastPage() - 1)
            @if ($paginator->currentPage() < $paginator->lastPage() - 2)
                <li class="disabled"><span>&hellip;</span></li>
            @endif
            <li><a href="{{ $paginator->url($paginator->currentPage() + 1) }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a></li>
        @endif

        {{-- Last Page Link --}}
        <li>
            <a href="{{ $paginator->url($paginator->lastPage()) }}" aria-label="@lang('pagination.last')">&rsaquo;&rsaquo;</a>
        </li>
    </ul>
@endif

@if ($paginator->hasPages())
    <ul class="pagination">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" aria-hidden="true">&lsaquo;</span>
            </li>
        @else
            <li class="page-item">
                <a href="#" wire:click="previousPage" rel="prev" class="page-link">&lsaquo;</a>
            </li>
        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a href="#" wire:click="gotoPage({{ $page }})" class="page-link">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a href="#" wire:click="nextPage" rel="next" class="page-link">&rsaquo;</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" aria-hidden="true">&rsaquo;</span>
            </li>
        @endif
    </ul>
@endif

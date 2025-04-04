@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">&lsaquo;</span>
            </li>
        @else
            <li class="page-item">
                <button type="button" class="page-link" wire:click="previousPage">&lsaquo;</button>
            </li>
        @endif

        {{-- First Page --}}
        <li class="page-item {{ $paginator->currentPage() == 1 ? 'active' : '' }}">
            <button type="button" class="page-link" wire:click="gotoPage(1)">1</button>
        </li>

        {{-- Dots before middle pages --}}
        @if ($paginator->currentPage() > 3)
            <li class="page-item disabled"><span class="page-link">...</span></li>
        @endif

        {{-- Middle Pages --}}
        @foreach (range(max(2, $paginator->currentPage() - 1), min($paginator->lastPage() - 1, $paginator->currentPage() + 1)) as $page)
            <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                <button type="button" class="page-link" wire:click="gotoPage({{ $page }})">{{ $page }}</button>
            </li>
        @endforeach

        {{-- Dots after middle pages --}}
        @if ($paginator->currentPage() < $paginator->lastPage() - 2)
            <li class="page-item disabled"><span class="page-link">...</span></li>
        @endif

        {{-- Last Page --}}
        <li class="page-item {{ $paginator->currentPage() == $paginator->lastPage() ? 'active' : '' }}">
            <button type="button" class="page-link" wire:click="gotoPage({{ $paginator->lastPage() }})">{{ $paginator->lastPage() }}</button>
        </li>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <button type="button" class="page-link" wire:click="nextPage">&rsaquo;</button>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">&rsaquo;</span>
            </li>
        @endif
    </ul>
@endif

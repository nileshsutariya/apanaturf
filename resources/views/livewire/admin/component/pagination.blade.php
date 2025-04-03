@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">‹</span>
            </li>
        @else
            <li class="page-item">
                <button type="button" class="page-link" wire:click="previousPage">‹</button>
            </li>
        @endif

        {{-- First 2 pages --}}
        @if ($paginator->currentPage() > 5)
            <li class="page-item"><button type="button" class="page-link" wire:click="gotoPage(1)">1</button></li>
            <li class="page-item"><button type="button" class="page-link" wire:click="gotoPage(2)">2</button></li>
            <li class="page-item disabled"><span class="page-link">...</span></li>
        @endif

        {{-- Middle Pages: current-1, current, current+1 --}}
        @foreach (range(max(1, $paginator->currentPage() - 1), min($paginator->lastPage(), $paginator->currentPage() + 1)) as $page)
            @if ($page == $paginator->currentPage())
                <li class="page-item active">
                    <span class="page-link">{{ $page }}</span>
                </li>
            @else
                <li class="page-item">
                    <button type="button" class="page-link" wire:click="gotoPage({{ $page }})">{{ $page }}</button>
                </li>
            @endif
        @endforeach

        {{-- Last 2 pages --}}
        @if ($paginator->currentPage() < $paginator->lastPage() - 3)
            <li class="page-item disabled"><span class="page-link">...</span></li>
            <li class="page-item"><button type="button" class="page-link" wire:click="gotoPage({{ $paginator->lastPage() - 1 }})">{{ $paginator->lastPage() - 1 }}</button></li>
            <li class="page-item"><button type="button" class="page-link" wire:click="gotoPage({{ $paginator->lastPage() }})">{{ $paginator->lastPage() }}</button></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <button type="button" class="page-link" wire:click="nextPage">›</button>
            </li>
        @else
            <li class="page-item disabled"><span class="page-link">›</span></li>
        @endif
    </ul>
@endif

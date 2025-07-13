@if ($paginator->hasPages())
<nav role="navigation" class="flex justify-center mt-6" aria-label="Pagination Navigation">
    <div class="inline-flex items-center rounded-md shadow bg-white overflow-hidden border border-gray-300">
        @if ($paginator->onFirstPage())
        <span class="px-4 py-2 text-gray-400 text-sm">‹</span>
        @else
        <a href="{{ $paginator->previousPageUrl() }}"
            class="px-4 py-2 text-sm font-medium text-blue-600 hover:bg-blue-50">‹</a>
        @endif
        @foreach ($elements as $element)
        @if (is_string($element))
        <span class="px-4 py-2 text-sm text-gray-500">{{ $element }}</span>
        @endif

        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <span class="px-4 py-2 text-sm font-bold text-white bg-blue-600">{{ $page }}</span>
        @else
        <a href="{{ $url }}" class="px-4 py-2 text-sm font-medium text-blue-600 hover:bg-blue-50">{{ $page }}</a>
        @endif
        @endforeach
        @endif
        @endforeach
        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}"
            class="px-4 py-2 text-sm font-medium text-blue-600 hover:bg-blue-50">›</a>
        @else
        <span class="px-4 py-2 text-gray-400 text-sm">›</span>
        @endif
    </div>
</nav>
@endif
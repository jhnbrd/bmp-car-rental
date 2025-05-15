@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 text-gray-400 cursor-not-allowed rounded-l-lg border border-gray-600">
                <i class="fas fa-chevron-left"></i>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 text-white hover:bg-blue-700 rounded-l-lg border border-gray-600 transition duration-150 ease-in-out">
                <i class="fas fa-chevron-left"></i>
            </a>
        @endif

        {{-- Pagination Elements --}}
        <div class="flex">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="px-4 py-2 text-gray-400 border-t border-b border-gray-600">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-4 py-2 text-white bg-blue-700 border border-gray-600">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="px-4 py-2 text-white hover:bg-blue-700 border border-gray-600 transition duration-150 ease-in-out">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 text-white hover:bg-blue-700 rounded-r-lg border border-gray-600 transition duration-150 ease-in-out">
                <i class="fas fa-chevron-right"></i>
            </a>
        @else
            <span class="px-4 py-2 text-gray-400 cursor-not-allowed rounded-r-lg border border-gray-600">
                <i class="fas fa-chevron-right"></i>
            </span>
        @endif
    </nav>
@endif 
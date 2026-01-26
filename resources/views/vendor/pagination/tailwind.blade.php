@if ($paginator->hasPages())
    <nav class="flex items-center justify-center gap-2 mt-8 flex-wrap" role="navigation" aria-label="Pagination">
        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <span
                class="inline-flex items-center gap-1 px-3 py-2 text-sm text-gray-400 bg-gray-100 rounded-xl cursor-not-allowed"
                aria-disabled="true">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="hidden sm:inline">Previous</span>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
                class="inline-flex items-center gap-1 px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-lime-50 hover:text-lime-600 hover:border-lime-300 transition"
                aria-label="Previous page">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="hidden sm:inline">Previous</span>
            </a>
        @endif

        {{-- Mobile: current page --}}
        <span
            class="inline-flex md:hidden px-4 py-2 text-sm font-semibold text-lime-600 bg-lime-50 border border-lime-200 rounded-xl"
            aria-current="page">
            {{ $paginator->currentPage() }}
        </span>

        {{-- Desktop: page numbers --}}
        <div class="hidden md:flex items-center gap-2">
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="px-3 py-2 text-sm text-gray-400">
                        {{ $element }}
                    </span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page === $paginator->currentPage())
                            <span
                                class="px-4 py-2 text-sm font-semibold text-lime-600 bg-lime-50 border border-lime-200 rounded-xl"
                                aria-current="page">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                                class="px-4 py-2 text-sm text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-lime-50 hover:text-lime-600 hover:border-lime-300 transition"
                                aria-label="Go to page {{ $page }}">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
                class="inline-flex items-center gap-1 px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-lime-50 hover:text-lime-600 hover:border-lime-300 transition"
                aria-label="Next page">
                <span class="hidden sm:inline">Next</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        @else
            <span
                class="inline-flex items-center gap-1 px-3 py-2 text-sm text-gray-400 bg-gray-100 rounded-xl cursor-not-allowed"
                aria-disabled="true">
                <span class="hidden sm:inline">Next</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </span>
        @endif
    </nav>
@endif

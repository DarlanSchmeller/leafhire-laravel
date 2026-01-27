<header x-data="{ open: false }" class="sticky top-0 z-40 backdrop-blur bg-blue-50/30 relative">
    <div class="max-w-7xl mx-auto px-6 py-4">
        <div class="flex items-center justify-between">

            <a href="{{ route('jobs.index') }}" class="flex items-center gap-3">
                <div class="w-12 h-12 md:w-16 md:h-16 rounded-2xl bg-lime-50/50 flex items-center justify-center">
                    <img src="{{ asset('images/leafhire.webp') }}" alt="LeafHire Icon"
                        class="w-9 h-9 md:w-14 md:h-14 object-contain" />
                </div>

                <span class="text-lg md:text-xl font-semibold tracking-tight text-lime-600">
                    Leaf<span class="font-bold text-lime-900">Hire</span>
                </span>
            </a>

            <nav class="hidden md:flex items-center gap-8">
                <a href="{{ route('jobs.index') }}"
                    class="text-lime-700 hover:text-lime-900 font-semibold transition rounded-lg py-2 px-4 border border-lime-600/60 hover:border-lime-800 bg-lime-50/50">
                    Browse Jobs
                </a>

                <x-button padding="px-6 py-2.5" rounded="rounded-xl">
                    Post a Job
                </x-button>
            </nav>

            <button @click="open = !open"
                class="md:hidden inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 transition"
                aria-label="Open menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <div x-cloak x-show="open" x-transition @click.outside="open = false"
        class="md:hidden absolute top-full inset-x-0 backdrop-blur-xs">
        <div class="px-6 py-6 space-y-4">
            <a href="{{ route('jobs.index') }}"
                class="block w-full text-center py-3 rounded-xl font-semibold text-lime-700 border border-lime-600/60 bg-lime-50/50 hover:bg-lime-50 transition">
                Browse Jobs
            </a>

            <a href="#"
                class="block w-full text-center py-3 rounded-xl font-semibold text-white bg-lime-600 hover:bg-lime-700 transition">
                Post a Job
            </a>
        </div>
    </div>
</header>

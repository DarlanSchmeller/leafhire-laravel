<header class="sticky top-0 z-40 backdrop-blur-xs bg-blue-50/20">
    <div class="max-w-7xl mx-auto px-6 py-4">
        <div class="flex items-center justify-between">

            <a href="{{ route('jobs.index') }}" class="flex items-center gap-2 group">
                <div class="w-16 h-16 rounded-2xl bg-blue-50 flex items-center justify-center">
                    <img src="{{ asset('images/leafhire.webp') }}" alt="LeafHire Icon" class="w-14 h-14 object-contain" />
                </div>

                <span class="text-xl font-bold text-lime-600 font-">
                    Leaf<span class="text-lime-900">Hire</span>
                </span>
            </a>

            <nav class="flex items-center gap-8">
                <a href="{{ route('jobs.index') }}"
                    class="text-green-600 hover:text-green-800 font-bold transition-colors rounded-lg py-2 px-4 border-2 border-lime-600 hover:border-lime-800">
                    Browse Jobs
                </a>

                <x-button padding="px-6 py-2.5" rounded="rounded-xl">
                    Post a Job
                </x-button>
            </nav>

        </div>
    </div>
</header>

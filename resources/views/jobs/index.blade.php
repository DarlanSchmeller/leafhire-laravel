<x-layout>

    <form action="{{ route('search') }}" method="GET" class="w-full">
        <x-search-bar :categories="$categories" />

        <div class="flex gap-8 w-full">
            <x-filter-sidebar />
            <div class="flex-1 min-w-0 flex flex-col gap-6">

                @foreach ($jobs as $job)
                    <x-job-card :job="$job" />
                @endforeach
            </div>
        </div>
    </form>

    {{ $jobs->withQueryString()->links() }}
</x-layout>

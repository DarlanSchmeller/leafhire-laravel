<x-layout>
    <x-tertiary-button :route="route('jobs.index')" />

    @if (!$job)
        <div class="max-w-4xl mx-auto text-center py-20">
            <p class="text-gray-600 font-bold text-lg mb-6">Job not found</p>
            <x-button :route="route('jobs.index')">
                <div class="flex flex-row items-center gap-2">
                    <x-heroicon-o-arrow-left class="w-5 h-5" />
                    Back to Home
                </div>
            </x-button>
        </div>
    @else
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                <x-job-details :job="$job" />
            </div>

            <div class="lg:col-span-1">
                <x-job-quick-overview :job="$job" />
            </div>
        </div>
    @endif
</x-layout>

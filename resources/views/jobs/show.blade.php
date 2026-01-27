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
                <div class="mt-14 pt-12 border-t border-gray-200">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-green-900">
                            More jobs from this employer
                        </h3>

                        <span class="text-sm text-gray-500">
                            {{ $job->employer->company_name }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        @foreach ($job->employer->jobs->where('id', '!=', $job->id)->take(4) as $relatedJob)
                            <x-job-card :job="$relatedJob" />
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <x-job-quick-overview :job="$job" />
            </div>
        </div>

    @endif
</x-layout>

@props([
    'job' => null,
])

<div class="bg-white rounded-3xl p-8 sticky top-24">
    <div class="mb-8">
        <h3 class="text-lg font-bold text-green-900 mb-6">
            Quick overview
        </h3>

        <div class="space-y-5">

            <div class="flex items-start gap-3">
                <x-heroicon-o-map-pin class="w-5 h-5 text-lime-600 mt-0.5" />
                <div>
                    <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Location</p>
                    <p class="text-sm text-green-900 font-medium mt-1">{{ $job->location }}</p>
                </div>
            </div>

            <div class="flex items-start gap-3">
                <x-heroicon-o-currency-dollar class="w-5 h-5 text-lime-600 mt-0.5" />
                <div>
                    <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Salary</p>
                    <p class="text-sm text-green-900 font-medium mt-1">
                        ${{ number_format($job->salary, 0, '', ',') }}
                    </p>
                </div>
            </div>

            <div class="flex items-start gap-3">
                <x-heroicon-o-briefcase class="w-5 h-5 text-lime-600 mt-0.5" />
                <div>
                    <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Category</p>
                    <p class="text-sm text-green-900 font-medium mt-1">{{ $job->category }}</p>
                </div>
            </div>

            <div class="flex items-start gap-3">
                <x-heroicon-o-clock class="w-5 h-5 text-lime-600 mt-0.5" />
                <div>
                    <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Experience</p>
                    <p class="text-sm text-green-900 font-medium mt-1">{{ ucfirst($job->experience) }}</p>
                </div>
            </div>

        </div>
    </div>

    <div class="pt-8 border-t border-gray-200 space-y-3">
        <x-button :route="route('job.application.create', $job->id)" :full-width="true">Apply now</x-button>
        <x-secondary-button :full-width="true">Save job</x-secondary-button>
    </div>

</div>

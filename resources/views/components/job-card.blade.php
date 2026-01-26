@props(['job'])

<div
    class="w-full bg-white rounded-2xl p-6 hover:shadow-xl hover:shadow-gray-200/50 transition-all duration-300 text-left
cursor-pointer group">
    <a href="{{ route('jobs.show', $job->id) }}">
        <div class="flex items-start justify-between mb-4">
            <div class="flex-1">
                <h3 class="text-xl font-semibold text-green-900 mb-1 group-hover:text-lime-600 transition-colors">
                    {{ $job->title }}
                </h3>
                <p class="text-base font-medium text-gray-600">{{ $job->company }}</p>
            </div>

            <div class="ml-4 shrink-0">
                <span class="inline-flex items-center px-3 py-1 rounded-lg bg-lime-50 text-lime-600 text-sm font-medium">
                    {{ ucfirst($job->experience) }}
                </span>
            </div>
        </div>

        <div class="flex flex-wrap gap-4 text-sm text-gray-600 mb-4">
            <div class="flex items-center gap-1.5">
                <x-heroicon-o-map-pin class="w-4 h-4" />
                <span>{{ $job->location }}</span>
            </div>
            <div class="flex items-center gap-1.5">
                <x-heroicon-o-briefcase class="w-4 h-4" />
                <span>{{ $job->category }}</span>
            </div>
            <div class="flex items-center gap-1.5">
                <x-heroicon-o-currency-dollar class="w-4 h-4" />
                <span>${{ number_format($job->salary, 0, '', ',') }}</span>
            </div>
        </div>

        <div class="flex items-center justify-between pt-4">
            <div class="flex items-center gap-1.5 text-sm text-gray-500">
                <x-heroicon-o-clock class="w-4 h-4" />
                <span>{{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</span>
            </div>
            <span class="text-lime-600 text-sm font-medium opacity-0 group-hover:opacity-100 transition-opacity">
                View details →
            </span>
        </div>
    </a>
</div>

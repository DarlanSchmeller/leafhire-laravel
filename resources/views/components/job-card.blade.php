@props(['job'])

<div
    class="relative w-full bg-white rounded-2xl p-6
           transition-all duration-300 text-left group
           {{ $job->deleted_at ? 'opacity-70 grayscale' : 'hover:shadow-xl hover:shadow-gray-200/50' }}">

    <a href="{{ route('jobs.show', $job->id) }}" class="absolute inset-0 rounded-2xl z-0"
        aria-label="View job details"></a>

    @if ($job->deleted_at)
        <span
            class="absolute top-4 right-4 z-20
                   inline-flex items-center gap-1
                   px-3 py-1 rounded-full
                   bg-red-50 text-red-700 text-xs font-semibold">
            <x-heroicon-o-lock-closed class="w-4 h-4" />
            Closed
        </span>
    @endif

    <div class="relative z-10">

        <div class="flex items-start justify-between mb-4">
            <div class="flex-1">
                <h3
                    class="text-xl font-semibold text-green-900 mb-1
                           {{ $job->deleted_at ? '' : 'group-hover:text-lime-600' }}
                           transition-colors">
                    {{ $job->title }}
                </h3>

                <p class="text-base font-medium text-gray-600">
                    {{ $job->employer->company_name }}
                </p>
            </div>

            <div class="ml-4 shrink-0">
                <span
                    class="inline-flex items-center px-3 py-1 rounded-lg
                           bg-lime-50 text-lime-600 text-sm font-medium">
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

        {{ $slot }}

        <div class="flex items-center justify-between pt-4">
            <div class="flex items-center gap-1.5 text-sm text-gray-500">
                <x-heroicon-o-clock class="w-4 h-4" />
                <span>{{ $job->created_at->diffForHumans() }}</span>
            </div>

            <span
                class="text-sm font-medium
                       {{ $job->deleted_at ? 'text-gray-400' : 'text-lime-600' }}
                       transition-opacity
                       opacity-100 md:opacity-0 md:group-hover:opacity-100">
                View details →
            </span>
        </div>

    </div>
</div>

@props([
    'job' => null,
])

<div class="bg-white rounded-3xl p-8 md:p-10">

    <div class="mb-8">
        <span class="inline-flex items-center px-3 py-1 rounded-lg bg-lime-50 text-lime-600 text-sm font-medium mb-4">
            {{ ucfirst($job->experience) }}
        </span>

        <h1 class="text-5xl font-bold text-green-900 mb-3">
            {{ $job->title }}
        </h1>

        <div class="flex items-center gap-2 text-lg text-gray-600">
            <x-heroicon-o-building-office-2 class="w-5 h-5" />
            <span class="font-medium">{{ $job->company }}</span>
        </div>
    </div>

    <div class="mb-10 pb-10 border-b border-gray-200">
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">

            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold mb-2">Location</p>
                <p class="text-base font-medium text-green-900 flex items-center gap-2">
                    <x-heroicon-o-map-pin class="w-4 h-4 text-gray-400" />
                    {{ $job->location }}
                </p>
            </div>

            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold mb-2">Salary</p>
                <p class="text-base font-medium text-green-900 flex items-center gap-2">
                    <x-heroicon-o-currency-dollar class="w-4 h-4 text-gray-400" />
                    ${{ number_format($job->salary, 0, '', ',') }}
                </p>
            </div>

            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold mb-2">Category</p>
                <p class="text-base font-medium text-green-900 flex items-center gap-2">
                    <x-heroicon-o-briefcase class="w-4 h-4 text-gray-400" />
                    {{ $job->category }}
                </p>
            </div>

            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold mb-2">Posted</p>
                <p class="text-base font-medium text-green-900 flex items-center gap-2">
                    <x-heroicon-o-clock class="w-4 h-4 text-gray-400" />
                    {{ $job->created_at->format('M d, Y') }}
                </p>
            </div>

        </div>
    </div>

    <div>
        <h2 class="text-3xl font-bold text-green-900 mb-6">
            About this role
        </h2>

        <div class="prose prose-gray max-w-none">
            <p class="text-gray-700 text-base leading-relaxed whitespace-pre-wrap">
                {{ $job->description }}
            </p>
        </div>
    </div>

</div>

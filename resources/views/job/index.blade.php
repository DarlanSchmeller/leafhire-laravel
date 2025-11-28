<x-layout>
    <x-search-bar />

    @foreach ($jobs as $job)
        <x-card class="mb-6">
            <div class="flex justify-between items-start mb-3">
                <div>
                    <h2 class="text-lg font-semibold text-slate-800">{{ $job->title }}</h2>
                    <p class="text-sm text-slate-500 mt-1">{{ $job->location }}</p>
                </div>

                <span class="text-slate-700 font-medium bg-slate-100 px-3 py-1 rounded-md">
                    ${{ number_format($job->salary) }}
                </span>
            </div>

            <div class="flex flex-wrap gap-2 text-xs mb-4">
                <span class="px-2 py-1 bg-blue-50 text-blue-700 rounded-md">
                    Experience: {{ ucfirst($job->experience) }}
                </span>

                <span class="px-2 py-1 bg-green-50 text-green-700 rounded-md">
                    {{ ucfirst($job->category) }}
                </span>

                <span class="px-2 py-1 bg-slate-100 text-slate-600 rounded-md">
                    Company Name
                </span>
            </div>

            <p class="text-sm text-slate-600 leading-relaxed">
                {!! nl2br(e($job->description)) !!}
            </p>

        </x-card>
    @endforeach
</x-layout>

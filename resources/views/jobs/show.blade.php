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
                <div class="bg-white rounded-3xl p-8 md:p-10">

                    <div class="mb-8">
                        <span class="inline-flex items-center px-3 py-1 rounded-lg bg-blue-50 text-blue-700 text-sm font-medium mb-4">
                            {{ $job->experience }}
                        </span>

                        <h1 class="text-5xl font-bold text-gray-900 mb-3">
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
                                <p class="text-base font-medium text-gray-900 flex items-center gap-2">
                                    <x-heroicon-o-map-pin class="w-4 h-4 text-gray-400" />
                                    {{ $job->location }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold mb-2">Salary</p>
                                <p class="text-base font-medium text-gray-900 flex items-center gap-2">
                                    <x-heroicon-o-currency-dollar class="w-4 h-4 text-gray-400" />
                                    ${{ number_format($job->salary, 0, '', ',') }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold mb-2">Category</p>
                                <p class="text-base font-medium text-gray-900 flex items-center gap-2">
                                    <x-heroicon-o-briefcase class="w-4 h-4 text-gray-400" />
                                    {{ $job->category }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold mb-2">Posted</p>
                                <p class="text-base font-medium text-gray-900 flex items-center gap-2">
                                    <x-heroicon-o-clock class="w-4 h-4 text-gray-400" />
                                    {{ $job->created_at->format('M d, Y') }}
                                </p>
                            </div>

                        </div>
                    </div>

                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">
                            About this role
                        </h2>

                        <div class="prose prose-gray max-w-none">
                            <p class="text-gray-700 text-base leading-relaxed whitespace-pre-wrap">
                                {{ $job->description }}
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white rounded-3xl p-8 sticky top-24">

                    <div class="mb-8">
                        <h3 class="text-lg font-bold text-gray-900 mb-6">
                            Quick overview
                        </h3>

                        <div class="space-y-5">

                            <div class="flex items-start gap-3">
                                <x-heroicon-o-map-pin class="w-5 h-5 text-blue-600 mt-0.5" />
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Location</p>
                                    <p class="text-sm text-gray-900 font-medium mt-1">{{ $job->location }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <x-heroicon-o-currency-dollar class="w-5 h-5 text-blue-600 mt-0.5" />
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Salary</p>
                                    <p class="text-sm text-gray-900 font-medium mt-1">
                                        ${{ number_format($job->salary, 0, '', ',') }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <x-heroicon-o-briefcase class="w-5 h-5 text-blue-600 mt-0.5" />
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Category</p>
                                    <p class="text-sm text-gray-900 font-medium mt-1">{{ $job->category }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <x-heroicon-o-clock class="w-5 h-5 text-blue-600 mt-0.5" />
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Experience</p>
                                    <p class="text-sm text-gray-900 font-medium mt-1">{{ $job->experience }}</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="pt-8 border-t border-gray-200 space-y-3">
                        <x-button :full-width="true">Apply now</x-button>
                        <x-secondary-button :full-width="true">Save job</x-secondary-button>
                    </div>

                </div>
            </div>

        </div>
    @endif
</x-layout>
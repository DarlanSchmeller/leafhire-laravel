<x-layout>
    <x-tertiary-button :route="route('jobs.show', $job->id)" />

    @if (!$job)
        <div class="max-w-xl mx-auto text-center py-20">
            <p class="text-gray-600 font-bold text-lg mb-6">Job not found</p>

            <x-button :route="route('jobs.index')">
                <div class="flex items-center gap-2">
                    <x-heroicon-o-arrow-left class="w-5 h-5" />
                    Back to jobs
                </div>
            </x-button>
        </div>
    @else
        <div class="max-w mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">

                <div class="flex-1 bg-white rounded-2xl p-8">
                    <h1 class="text-2xl font-bold text-green-900 mb-2">
                        {{ $job->title }}
                    </h1>

                    <p class="text-sm text-gray-500 mb-4">
                        {{ $job->employer->company_name }} · {{ $job->location }}
                    </p>

                    <div class="flex flex-wrap gap-3 text-sm text-gray-600 mb-6">
                        <span class="px-3 py-1 bg-green-50 text-green-700 rounded-full">
                            {{ $job->category }}
                        </span>

                        <span class="px-3 py-1 bg-gray-100 rounded-full">
                            {{ $job->experience }}
                        </span>

                        @if ($job->salary)
                            <span class="px-3 py-1 bg-gray-100 rounded-full">
                                {{ $job->salary }}
                            </span>
                        @endif
                    </div>

                    <div class="pt-6 border-t border-gray-100">
                        <p class="text-gray-700 leading-relaxed whitespace-pre-line">
                            {{ $job->description }}
                        </p>
                    </div>
                </div>

                <div class="w-full lg:w-[460px] shrink-0">
                    <div class="bg-white rounded-2xl p-8 sticky top-24">
                        <h2 class="text-xl font-bold text-green-900 mb-6">
                            Apply to this job
                        </h2>

                        <form method="POST" action="{{ route('job.application.store', $job) }}"
                            class="flex flex-col gap-6" enctype="multipart/form-data">
                            @csrf

                            <x-input name="expected_salary" placeholder="Expected salary" required>
                                <x-slot:icon>
                                    <x-heroicon-o-currency-dollar class="w-5 h-5 text-gray-400 shrink-0" />
                                </x-slot:icon>
                            </x-input>

                            <x-input-file name="cv" placeholder="Upload your CV (PDF)">
                                <x-slot:icon>
                                    <x-heroicon-o-paper-clip class="w-5 h-5 text-gray-400 shrink-0" />
                                </x-slot:icon>
                            </x-input-file>

                            <x-button type="submit">
                                Apply now
                            </x-button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    @endif
</x-layout>

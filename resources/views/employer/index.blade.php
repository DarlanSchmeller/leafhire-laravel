<x-layout>
    <x-tertiary-button />

    <h1 class="text-2xl font-semibold text-green-900 mb-6">
        My Job Listings
    </h1>

    @if ($jobListings->count())
        <div class="space-y-6">
            @foreach ($jobListings as $job)
                <x-job-card :job="$job">
                    <div class="mt-4 border-t pt-4 space-y-3 text-sm text-green-700">

                        <div class="flex items-center gap-2 text-gray-500">
                            <x-heroicon-o-calendar class="w-4 h-4 text-green-500" />
                            <span>
                                Posted {{ $job->created_at->diffForHumans() }}
                            </span>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <div x-data="{ open: false }" class="relative">
                                <button @click="open = !open"
                                    class="w-full bg-green-50 rounded-xl p-3 text-left hover:bg-green-100 transition">

                                    <p class="text-xs text-green-700 font-medium flex items-center gap-2">
                                        <x-heroicon-o-users class="w-4 h-4" />
                                        Applicants
                                    </p>

                                    <p class="text-lg font-semibold text-green-800 flex items-center justify-between">
                                        {{ $job->job_applications_count }}
                                        <x-heroicon-o-chevron-down class="w-4 h-4 text-green-600" />
                                    </p>
                                </button>

                                <div x-cloak x-show="open" x-transition @click.outside="open = false"
                                    class="absolute z-20 mt-2 w-80 bg-white rounded-2xl shadow-lg border p-3">

                                    @if ($job->jobApplications->count())
                                        <ul class="divide-y text-sm">
                                            @foreach ($job->jobApplications as $application)
                                                <li class="py-2 flex items-center justify-between gap-3">

                                                    <div>
                                                        <p class="font-medium text-gray-800">
                                                            {{ $application->user->name }}
                                                        </p>
                                                        <p class="text-xs text-gray-500">
                                                            Applied {{ $application->created_at->diffForHumans() }}
                                                        </p>
                                                    </div>

                                                    <span class="text-green-700 font-semibold text-sm">
                                                        ${{ number_format($application->expected_salary, 0, '', ',') }}
                                                    </span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="text-gray-500 text-sm text-center py-4">
                                            No applications yet
                                        </p>
                                    @endif
                                </div>
                            </div>


                            <div class="bg-gray-50 rounded-xl p-3">
                                <p class="text-xs text-gray-600 font-medium">
                                    Average expected salary
                                </p>
                                <p class="text-lg font-semibold text-green-800">
                                    @if ($job->job_applications_avg_expected_salary)
                                        ${{ number_format($job->job_applications_avg_expected_salary, 0, '', ',') }}
                                    @else
                                        —
                                    @endif
                                </p>
                            </div>

                            <div class="bg-gray-50 rounded-xl p-3">
                                <p class="text-xs text-gray-600 font-medium">
                                    Status
                                </p>
                                <p class="text-lg font-semibold text-green-800">
                                    Active
                                </p>
                            </div>
                        </div>

                        <div class="flex justify-end gap-4 pt-2">
                            <a href="{{ route('jobs.show', $job) }}"
                                class="text-sm font-medium text-green-700 hover:underline">
                                View
                            </a>

                            <a href="{{ route('jobs.edit', $job) }}"
                                class="text-sm font-medium text-blue-600 hover:underline">
                                Edit
                            </a>

                            <form method="POST" action="{{ route('jobs.', $job) }}"
                                onsubmit="return confirm('Are you sure you want to delete this job listing?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="text-sm font-medium text-red-600 hover:underline">
                                    Delete
                                </button>
                            </form>
                        </div>

                    </div>
                </x-job-card>
            @endforeach
        </div>
    @else
        <div class="mx-auto flex max-w-lg flex-col items-center justify-center gap-6 text-center">
            <p class="text-gray-500">
                You haven't posted any job listings yet.
            </p>

            <x-button :route="route('jobs.create')">
                Post Job Listing
            </x-button>
        </div>

    @endif

    {{ $jobListings->withQueryString()->links() }}
</x-layout>

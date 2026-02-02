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
                            <div class="bg-green-50 rounded-xl p-3">
                                <p class="text-xs text-green-700 font-medium">
                                    Total applications
                                </p>
                                <p class="text-lg font-semibold text-green-800">
                                    {{ $job->job_applications_count }}
                                </p>
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
                                    {{ $job->is_active ? 'Active' : 'Closed' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex justify-end gap-4 pt-2">
                            <a href="{{ route('jobs.show', $job) }}"
                                class="text-sm font-medium text-green-700 hover:underline">
                                View
                            </a>

                            <a href="{{ route('jobs.index', $job) }}"
                                class="text-sm font-medium text-blue-600 hover:underline">
                                Edit
                            </a>

                            <form method="POST" action="{{ route('jobs.index', $job) }}"
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
        <p class="text-gray-500">
            You haven't posted any job listings yet.
        </p>
    @endif

    {{ $jobListings->withQueryString()->links() }}
</x-layout>

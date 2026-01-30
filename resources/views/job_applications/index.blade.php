<x-layout>
    <x-tertiary-button />
    @if ($jobApplications->count())
        <div class="space-y-6">
            @foreach ($jobApplications as $jobApplication)
                @if ($jobApplication->job)
                    <x-job-card :job="$jobApplication->job">
                        <div class="mt-4 border-t pt-4 space-y-3 text-sm text-green-700">

                            <div class="flex items-center gap-2 text-gray-500">
                                <x-heroicon-o-check-circle class="w-4 h-4 text-green-500" />
                                <span>
                                    Applied {{ $jobApplication->created_at->diffForHumans() }}
                                </span>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                <div class="bg-green-50 rounded-xl p-3">
                                    <p class="text-xs text-green-700 font-medium">
                                        Your asking salary
                                    </p>
                                    <p class="text-lg font-semibold text-green-800">
                                        ${{ number_format($jobApplication->expected_salary, 0, '', ',') }}
                                    </p>
                                </div>

                                <div class="bg-gray-50 rounded-xl p-3">
                                    <p class="text-xs text-gray-600 font-medium">
                                        Average expected salary
                                    </p>
                                    <p class="text-lg font-semibold text-green-800">
                                        ${{ number_format($jobApplication->job->job_applications_avg_expected_salary, 0, '', ',') }}
                                    </p>
                                </div>

                                <div class="bg-gray-50 rounded-xl p-3">
                                    <p class="text-xs text-gray-600 font-medium">
                                        Other applicants
                                    </p>
                                    <p class="text-lg font-semibold text-green-800">
                                        {{ $jobApplication->job->job_applications_count - 1 }}
                                        {{ Str::plural('applicant', $jobApplication->job->job_applications_count - 1) }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex justify-end pt-2">
                                <form method="POST"
                                    action="{{ route('my-job-applications.destroy', $jobApplication) }}"
                                    onsubmit="return confirm('Are you sure you want to cancel your job application?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="text-sm font-medium text-red-600 hover:text-red-700 hover:underline transition cursor-pointer">
                                        Cancel application
                                    </button>
                                </form>
                            </div>
                        </div>
                    </x-job-card>
                @endif
            @endforeach
        </div>
    @else
        <p class="text-gray-500">You haven't applied to any jobs yet.</p>
    @endif
    {{ $jobApplications->withQueryString()->links() }}
</x-layout>

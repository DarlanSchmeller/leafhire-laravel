<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $this->authorize('viewAny', JobApplication::class);
        $jobApplications = Auth::user()->jobApplications()->latest()->with([
            'job' => fn($query) => $query->withCount('jobApplications')
                ->withAvg('jobApplications', 'expected_salary'),
            'job.employer',
        ])->paginate(6);

        return view('job_applications.index')->with('jobApplications', $jobApplications);
    }

    /**
     * Show the form for creating a new job application.
     */
    public function create(JobListing $job): View|RedirectResponse
    {
        $this->authorize('create', JobApplication::class);
        if (!Auth::user()->can('apply', $job)) {
            return back()->with('error', 'You have already applied to this job');
        };
        return view('job_applications.create')->with('job', $job);
    }

    /**
     * Store a newly created job application in storage.
     */
    public function store(JobListing $job, Request $request): RedirectResponse
    {
        $user = Auth::user();
        $alreadyApplied = $job->hasUserApplied($user);

        if ($alreadyApplied) {
            return back()->with('error', 'You have already applied to this job');
        }

        $validatedData = $request->validate([
            'expected_salary' => 'required|string|min:3',
            'cv' => 'required|file|mimes:pdf|max:2048'
        ]);

        $file = $request->file('cv');
        $path = $file->store('csv', 'private');

        $job->jobApplications()->create([
            'user_id' => $user->id,
            'job_listing_id' => $job->id,
            'expected_salary' => $validatedData['expected_salary'],
            'cv_path' => $path
        ]);

        return redirect()->route('jobs.show', $job->id)->with('success', 'You have successfully applied to this job!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApplication $myJobApplication): RedirectResponse
    {
        $this->authorize('delete', $myJobApplication);
        $myJobApplication->delete();

        return back()->with('success', 'Job application cancelled successfully!');
    }
}

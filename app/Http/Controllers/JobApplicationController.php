<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\JobListing;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class JobApplicationController extends Controller
{
    use AuthorizesRequests;

    /**
     * Show the form for creating a new job application.
     */
    public function create(JobListing $job): View|RedirectResponse
    {
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
     * Display the specified job application.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified job application.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified job application in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified job application from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

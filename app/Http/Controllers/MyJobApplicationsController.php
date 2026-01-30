<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class MyJobApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $jobApplications = Auth::user()->jobApplications()->latest()->with([
            'job' => fn($query) => $query->withCount('jobApplications')
                ->withAvg('jobApplications', 'expected_salary'),
            'job.employer',
        ])->paginate(6);

        return view('job_applications.index')->with('jobApplications', $jobApplications);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApplication $myJobApplication): RedirectResponse
    {
        $myJobApplication->delete();

        return back()->with('success', 'Job application cancelled successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobApplicationController extends Controller
{
    /**
     * Show the form for creating a new job application.
     */
    public function create(JobListing $job): View
    {
        return view('job_applications.create')->with('job', $job);
    }

    /**
     * Store a newly created job application in storage.
     */
    public function store(Request $request)
    {
        //
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

<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Employer;
use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobListingController extends Controller
{
    public function __construct()
    {
        $this->middleware(Employer::class)->only('create');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $jobs = JobListing::latest()->paginate(10);
        $categories = JobListing::$category;

        return view('jobs.index')->with([
            'jobs' => $jobs,
            'categories' => $categories
        ]);
    }

    public function search(Request $request): View
    {
        $filters = $request->only([
            'keyword',
            'location',
            'category',
            'experience',
            'min_salary',
            'max_salary',
        ]);

        $jobs = JobListing::query()->filter($filters)->paginate(10);

        $categories = JobListing::$category;

        return view('jobs.index')->with([
            'jobs' => $jobs,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(JobListing $job): View
    {
        $relatedJobs = $job->employer->jobs->where('id', '!=', $job->id)->take(4);

        return view('jobs.show')->with([
            'job' => $job,
            'relatedJobs' => $relatedJobs
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

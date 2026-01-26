<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobController extends Controller
{
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
        $jobs = JobListing::query();

        $filters = $request->only([
            'keyword',
            'location',
            'category',
            'experience',
            'min_salary',
            'max_salary',
        ]);

        $jobs->when(
            filled($filters['keyword'] ?? null),
            fn($q) =>
            $q->where('title', 'LIKE', '%' . $filters['keyword'] . '%')
        )
            ->when(
                filled($filters['location'] ?? null),
                fn($q) =>
                $q->where('location', 'LIKE', '%' . $filters['location'] . '%')
            )
            ->when(
                filled($filters['category'] ?? null),
                fn($q) =>
                $q->where('category', $filters['category'])
            )
            ->when(
                filled($filters['experience'] ?? null),
                fn($q) =>
                $q->where('experience', $filters['experience'])
            )
            ->when(
                filled($filters['min_salary'] ?? null),
                fn($q) =>
                $q->where('salary', '>=', (int) $filters['min_salary'])
            )
            ->when(
                filled($filters['max_salary'] ?? null),
                fn($q) =>
                $q->where('salary', '<=', (int) $filters['max_salary'])
            );

        $jobs = $jobs->paginate(10);
        $categories = JobListing::$category;

        return view('jobs.index')->with([
            'jobs' => $jobs,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        return view('jobs.show')->with('job', $job);
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

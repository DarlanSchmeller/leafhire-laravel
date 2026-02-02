<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class EmployerController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Employer::class);
    }

    public function index(): View
    {
        $jobListings = Auth::user()
            ->employer
            ->jobs()
            ->withCount('jobApplications')
            ->withAvg('jobApplications', 'expected_salary')
            ->latest()
            ->paginate(10);

        return view('employer.index')->with('jobListings', $jobListings);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('employer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        Auth::user()->employer()->create(
            $request->validate([
                'company_name' => 'required|string|min:3|unique:employers,company_name'
            ])
        );

        return redirect()->route('jobs.index')->with('success', 'Your employer account has been successfully registered!');
    }
}

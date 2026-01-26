<?php

namespace App\View\Components;

use App\Models\JobListing;
use Illuminate\View\Component;

class FilterSidebar extends Component
{
    public array $experienceLevels;

    public string $selectedExperience;
    public string $minSalary;
    public string $maxSalary;
    public bool $isMobileOpen;

    public function __construct(
        bool $isMobileOpen = false
    ) {
        $this->experienceLevels = JobListing::$experience;
        $this->selectedExperience = $_REQUEST['experience'] ?? '';
        $this->minSalary = $_REQUEST['min_salary'] ?? '';
        $this->maxSalary = $_REQUEST['max_salary'] ?? '';
        $this->isMobileOpen = $isMobileOpen;
    }

    public function hasActiveFilters(): bool
    {
        return ! empty($this->selectedExperience) ||
            ! empty($this->minSalary) ||
            ! empty($this->maxSalary);
    }

    public function render()
    {
        return view('components.filter-sidebar');
    }
}

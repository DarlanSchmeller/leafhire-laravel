<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobListing extends Model
{
    /** @use HasFactory<\Database\Factories\JobListingFactory> */
    use HasFactory;

    protected $table = 'job_listings';

    protected $fillable = [
        'title',
        'description',
        'salary',
        'location',
        'category',
        'experience'
    ];

    public static array $experience = [
        'entry',
        'intermediate',
        'senior'
    ];

    public static array $category = [
        'IT',
        'Finance',
        'Sales',
        'Marketing'
    ];

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return $query->when(
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
    }

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }
}

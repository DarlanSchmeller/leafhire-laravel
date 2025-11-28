<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}

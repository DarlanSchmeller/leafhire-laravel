<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\JobApplication;
use App\Models\JobListing;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(150)->create()->shuffle();

        // Create employers
        Employer::factory(20)->recycle($users->take(20))->create();

        $employers = Employer::all()->shuffle();

        JobListing::factory(100)->recycle($employers)->create();

        foreach ($users as $user) {
            $jobs = JobListing::take(rand(0, 4))->get();

            foreach ($jobs as $job) {
                JobApplication::factory()->create([
                    'job_listing_id' => $job->id,
                    'user_id' => $user->id
                ]);
            }
        }
    }
}

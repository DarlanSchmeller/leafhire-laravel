<?php

namespace Database\Seeders;

use App\Models\Employer;
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
    }
}

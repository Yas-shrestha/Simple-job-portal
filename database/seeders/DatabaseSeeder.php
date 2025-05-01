<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Job;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->count(3)->create([
            'role' => 'company',
        ])->each(function ($user) {
            // Create a company for each company user
            $randomImageUrl = 'https://picsum.photos/600/400?random=' . rand(1, 1000);
            $company = Company::create([
                'user_id' => $user->id,
                'name' => fake()->company,
                'img' => $randomImageUrl,
                'description' => fake()->paragraph,
                'location' => fake()->city,
            ]);

            // Create 5 job listings per company user via JobFactory
            Job::factory()->count(5)->create([
                'user_id' => $user->id,
            ]);
        });
    }
}

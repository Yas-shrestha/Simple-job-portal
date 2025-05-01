<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Job::class;
    public function definition(): array
    {
        $randomImageUrl = 'https://picsum.photos/600/400?random=' . rand(1, 1000);
        return [
            'title' => fake()->jobTitle,
            'description' => fake()->paragraph(3),
            'location' => fake()->city,
            'end_date' => fake()->dateTimeBetween('now', '+2 months')->format('Y-m-d'),
            'salary' => fake()->numberBetween(25000, 80000),
            'img' => $randomImageUrl, // or a path to a fake image
            'user_id' => User::factory(),
        ];
    }
}

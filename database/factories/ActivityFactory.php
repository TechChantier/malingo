<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'user_id' => fake()->randomNumber(User::count()),
            'user_id' => 1,
            'title' => fake()->name(),
            'ActivityPhoto' => '',
            'description' => fake()->paragraph(),
            'link' => fake()->url(),
            'numberOfMembers' => fake()->numberBetween(0, 50),
            'location' => fake()->text(20),
            'time' => fake()->dateTime(),
        ];
    }
}

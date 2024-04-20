<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [

            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'thumbnail' => $this->faker->imageUrl(),
            'description' => fake()->realText(3000),
            'company' => $this->faker->company(),
            'qualifications' => fake()->realText(3000),
            'link' => $this->faker->url(),
            'active' => fake()->boolean,
            'published_at' => fake()->dateTime,
            'user_id' => 1,
            
        ];
    }
}

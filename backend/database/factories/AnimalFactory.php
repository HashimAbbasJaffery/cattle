<?php

namespace Database\Factories;

use App\Models\Age;
use App\Models\Breed;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->name();
        return [
            "name" => $title,
            "breed_id" => fake()->numberBetween(1, 6),
            "age_id" => fake()->numberBetween(1,5),
            "live_weight" => fake()->numberBetween(150, 1000),
            "gender" => fake()->boolean(),
            "availability" => fake()->boolean(),
            "slug" => Str::slug($title),
            "price" => fake()->numberBetween(50_000, 99_999)
        ];
    }
}

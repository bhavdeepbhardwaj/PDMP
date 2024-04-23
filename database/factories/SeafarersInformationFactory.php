<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SeafarersInformation>
 */
class SeafarersInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'select_month' => $this->faker->numberBetween(1, 12),
            'select_year' => $this->faker->numberBetween(2022, 2024),
            'total_seafarers' => $this->faker->numberBetween(1, 100000),
            'woman_seafarer' => $this->faker->numberBetween(1, 1000), // Assuming woman_seafarer can be any number between 0 and 100
            'created_by' => 1,
        ];
    }
}

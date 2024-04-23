<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NationalWaterwaysInformation>
 */
class NationalWaterwaysInformationFactory extends Factory
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
            'select_year' => $this->faker->numberBetween(2019, 2024),
            'national_waterway_no' => $this->faker->numberBetween(1, 1000000),
            'length_km' => $this->faker->numberBetween(1, 5000000),
            'details_of_waterways' => $this->faker->numberBetween(1, 1000000),
            'cargo_moved' => $this->faker->numberBetween(1, 10000000),
            'created_by' => 1,
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IndianTonnage>
 */
class IndianTonnageFactory extends Factory
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
            'trade' => $this->faker->randomElement(['Coastal', 'Overseas']),
            'no_of_ships' => $this->faker->numberBetween(1, 1000000),
            'gross_tonnage' => $this->faker->numberBetween(1000, 100000), // Assuming gross_tonnage can range from 1000 to 100000
            'dead_weight_tonnage' => $this->faker->numberBetween(1000, 100000), // Assuming dead_weight_tonnage can range from 1000 to 100000
            'created_by' => 1,
        ];
    }
}

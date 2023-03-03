<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PhoneCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //card_type random number between 1 and 4
            'card_type' => $this->faker->randomNumber(1, 4),
            'card_serial' => $this->faker->numerify('##########'),
            'card_number' => $this->faker->numerify('##########'),
            'card_denomination' => $this->faker->randomElement([10000, 20000, 50000, 100000, 200000, 500000]),
            'is_valid' => $this->faker->boolean,
            'created_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_date' => null,
            'deleted_date' => null,
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Account;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class WalletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_id = Account::pluck('id')->toArray();
        return [
            'user_id' => $this->faker->randomElement($user_id),
            'balance' => $this->faker->randomNumber(),
            'created_date' => $this->faker->dateTime(),
            'updated_date' => $this->faker->dateTime(),
            'deleted_date' => $this->faker->dateTime(),
        ];
    }
}

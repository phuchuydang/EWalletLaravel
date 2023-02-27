<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => $this->faker->userName,
            'password' => Hash::make('12345678'), 
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->unique()->phoneNumber,
            'fullname' => $this->faker->name,
            'address' => $this->faker->address,
            'birthday' => $this->faker->date(),
            'first_identity_card' => $this->faker->creditCardNumber,
            'second_identity_card' => $this->faker->creditCardNumber,
            'is_actived' => $this->faker->boolean,
            'is_verified' => $this->faker->boolean,
            'is_abnormal' => $this->faker->boolean,
            'created_date' => $this->faker->date(),
        ];
    }
}

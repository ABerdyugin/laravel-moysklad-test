<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Counterparty>
 */
class CounterpartyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->firstName(),
            'lastName' => $this->faker->lastName(),
            'phone'=>$this->faker->phoneNumber,
            'email'=>$this->faker->email
        ];
    }
}

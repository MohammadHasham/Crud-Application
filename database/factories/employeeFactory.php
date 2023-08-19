<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\employee>
 */
class employeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'email'=>fake()->email(),
            'address'=>fake()->streetName(),
            'city'=>fake()->city(),
            'state'=>fake()->state(),
            'country'=>fake()->country(),
            'dob'=>fake()->date(),
            'gender'=>fake()->randomElement(['Male','Female','Other']),
            'password'=>fake()->password(),
            'password_confirmation'=>fake()->password()
        ];
    }
}

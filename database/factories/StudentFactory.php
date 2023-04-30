<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name,
            'birthday' => fake()->date(),
            'phone' => fake()->phoneNumber,
            'qualification' => fake()->text(),
            'email'    => fake()->email(),
            'password'      => Hash::make('24682468')
        ];
    }
}

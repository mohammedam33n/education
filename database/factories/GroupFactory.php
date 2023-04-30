<?php

namespace Database\Factories;

use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->word,
            'from' => fake()->time(),
            'to' => fake()->time(),
            'age_type' => Group::GROUP_TYPES[rand(0, 1)],
        ];
    }
}

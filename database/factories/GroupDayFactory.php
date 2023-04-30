<?php

namespace Database\Factories;

use App\Models\GroupDay;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<GroupDay>
 */
class GroupDayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        return [
            'day' => $this->faker->dayOfWeek,
            'group_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}

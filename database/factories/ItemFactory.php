<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'details'       => $this->faker->sentences(4, true),
            'date'         => $this->faker->dateTime($max = 'now', $timezone = null),
            'time'         => $this->faker->dateTime($max = 'now', $timezone = null),
            'title'         => $this->faker->word(),
            'event_id'         => $this->faker->numberBetween(1,15)

        ];
    }
}

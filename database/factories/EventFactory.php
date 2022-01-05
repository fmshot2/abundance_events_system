<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
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
            'title'         => $this->faker->title(),
            'date'          => $this->faker->dateTime($max = 'now', $timezone = null),
        ];
    }
}

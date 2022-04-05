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
            'title'         => $this->faker->name(),
            'date'          => $this->faker->date('Y_m_d'),
            'time_start'    => $this->faker->time('H:i:s'),
            'time_end'    => $this->faker->time('H:i:s'),
            // $this->faker->dateTime($max = 'now', $timezone = null),
        ];
    }
}

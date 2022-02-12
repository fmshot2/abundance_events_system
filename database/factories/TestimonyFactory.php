<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonyFactory extends Factory
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
            'name'          => $this->faker->name(),
            'profession'    => $this->faker->word(),
            'rating'        => $this->faker->randomDigit(),
        ];
    }
}

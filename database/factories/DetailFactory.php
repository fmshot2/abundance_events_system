<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DetailFactory extends Factory
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
            'email'         => $this->faker->unique()->safeEmail(),
            'address'       => $this->faker->paragraph(),
            'facebook'      => $this->faker->url(),
            'linkedin'      => $this->faker->url(),
            'twitter'       => $this->faker->url(),
            'youtube'       => $this->faker->url(),
            'instagram'     => $this->faker->url(),
            'email2'        => $this->faker->url(),
        ];
    }
}

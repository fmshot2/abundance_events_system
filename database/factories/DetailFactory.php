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
            'email_1'         => $this->faker->unique()->safeEmail(),
            'email_2'         => $this->faker->unique()->safeEmail(),
            'email_3'         => $this->faker->unique()->safeEmail(),
            'phone_1'         => $this->faker->unique()->regexify('09[0-9]{9}'),
            'phone_2'         => $this->faker->unique()->regexify('09[0-9]{9}'),
            'phone_3'         => $this->faker->unique()->regexify('09[0-9]{9}'),
            'address'       => $this->faker->paragraph(),
            'facebook'      => $this->faker->url(),
            'linkedin'      => $this->faker->url(),
            'twitter'       => $this->faker->url(),
            'youtube'       => $this->faker->url(),
            'instagram'     => $this->faker->url(),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SpeakerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'topic_details'       => $this->faker->name(),
            'fullname'         => $this->faker->name(),
            'title'         => $this->faker->word(),
            'qualifications' => $this->faker->name(),
            // 'item_id'         => $this->faker->numberBetween(1,40)
        ];
    }
}

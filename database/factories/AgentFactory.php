<?php

namespace Database\Factories;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'full_name'   => fake()->firstName() . ' ' . fake()->lastName(),
            'title'       => 'Real Estate Agent',
            'description' => fake()->words(20, asText: true),
            'photo'       => 'images/person_' . random_int(1, 6) . '-min.jpg',
            'twitter'     => fake()->url(),
            'facebook'    => fake()->url(),
            'linkedin'    => fake()->url(),
            'instagram'   => fake()->url(),
        ];
    }
}

<?php

namespace Database\Factories\Points;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Points\Point>
 */
class PointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'x' => $this->faker->numberBetween(0, 100),
            'y' => $this->faker->numberBetween(0, 100),
            'opened_at' => $this->faker->time('H:i'),
            'closed_at' => $this->faker->time('H:i'),
        ];
    }
}

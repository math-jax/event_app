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
            'title' => $this->faker->name(),
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'start_date' => now()->subWeeks(2)->toDateString(),
            'end_date' => now()->addWeeks(2)->toDateString(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

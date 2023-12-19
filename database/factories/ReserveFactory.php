<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reserve>
 */
class ReserveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'phone_number' => $this->faker->phoneNumber,
            'name_of_game' => $this->faker->word,
            'due_date' => $this->faker->dateTimeBetween('now', '+7 days'),
            'rent_date' => $this->faker->dateTimeBetween('-7 days', 'now')
        ];
    }
}

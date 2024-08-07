<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ue>
 */
class UeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'date_debut' => $this->faker->date(),
            'date_fin' => $this->faker->date(),
            'coef' => $this->faker->randomFloat(2, 0, 4),
            'libelle' => $this->faker->word()
        ];
    }
}

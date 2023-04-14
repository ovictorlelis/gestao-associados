<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Associate>
 */
class AssociateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'card' => fake()->randomNumber(4, true),
            'document' => fake()->randomNumber(9, true),
            'rg' => fake()->randomNumber(5, true),
            'type' => 'holder', //'dependent',
            'pendency' => false,
        ];
    }
}

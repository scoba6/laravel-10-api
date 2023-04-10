<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'refpro' => fake()->numerify('ref-###'),
            'dscpro' => Str::random(10),
            'qtepro' => fake()->randomNumber(3),
            'pripro' => fake()->randomNumber(8)
        ];
    }
}

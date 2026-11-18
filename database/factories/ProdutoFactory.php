<?php

namespace Database\Factories;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Produto> */
class ProdutoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => fake()->unique()->words(2, true),
            'categoria' => fake()->randomElement(Produto::CATEGORIAS),
            'preco' => fake()->randomFloat(2, 2, 80),
            'estoque' => fake()->numberBetween(10, 50),
            'estoque_minimo' => 5,
        ];
    }
}

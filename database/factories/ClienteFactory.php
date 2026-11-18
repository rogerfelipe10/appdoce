<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Cliente> */
class ClienteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'contato' => fake()->numerify('(##) 9####-####'),
            'endereco' => fake()->streetAddress(),
        ];
    }
}

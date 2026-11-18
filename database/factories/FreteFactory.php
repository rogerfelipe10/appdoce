<?php

namespace Database\Factories;

use App\Models\Frete;
use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Frete> */
class FreteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'pedido_id' => Pedido::factory(),
            'endereco' => fake()->streetAddress(),
            'taxa' => 8.5,
            'data_prevista' => now()->addDays(3)->toDateString(),
            'rastreio' => strtoupper(fake()->bothify('BR#########')),
            'status' => 'Preparando',
        ];
    }
}

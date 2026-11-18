<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Pedido> */
class PedidoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cliente_id' => Cliente::factory(),
            'produto_id' => Produto::factory(),
            'quantidade' => 1,
            'total' => 10,
            'status' => 'Pendente',
        ];
    }
}

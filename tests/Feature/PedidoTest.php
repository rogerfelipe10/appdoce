<?php

namespace Tests\Feature;

use App\Models\Cliente;
use App\Models\Produto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PedidoTest extends TestCase
{
    use RefreshDatabase;

    public function test_pedido_reduz_estoque(): void
    {
        $cliente = Cliente::factory()->create();

        $produto = Produto::factory()->create([
            'preco' => 10,
            'estoque' => 20
        ]);

        $response = $this->post('/pedidos', [
            'cliente_id' => $cliente->id,
            'produto_id' => $produto->id,
            'quantidade' => 5
        ]);

        $response->assertRedirect('/pedidos');

        $this->assertEquals(15, $produto->fresh()->estoque);

        $this->assertDatabaseHas('pedidos', [
            'produto_id' => $produto->id,
            'quantidade' => 5,
            'total' => 50,
            'status' => 'Confirmado'
        ]);
    }

    public function test_bloqueia_pedido_sem_estoque(): void
    {
        $cliente = Cliente::factory()->create();

        $produto = Produto::factory()->create([
            'estoque' => 3
        ]);

        $response = $this->post('/pedidos', [
            'cliente_id' => $cliente->id,
            'produto_id' => $produto->id,
            'quantidade' => 10
        ]);

        $response->assertSessionHasErrors('quantidade');

        $this->assertEquals(3, $produto->fresh()->estoque);

        $this->assertDatabaseCount('pedidos', 0);
    }
}
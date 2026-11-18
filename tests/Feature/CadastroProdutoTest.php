<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CadastroProdutoTest extends TestCase
{
    use RefreshDatabase;

    public function test_cadastrar_produto(): void
    {
        $response = $this->post('/produtos', [
            'nome' => 'Bolo de Morango',
            'categoria' => 'Bolos',
            'preco' => 35.00,
            'estoque' => 20,
            'estoque_minimo' => 5
        ]);

        $response->assertRedirect('/produtos');

        $this->assertDatabaseHas('produtos', [
            'nome' => 'Bolo de Morango',
            'estoque' => 20
        ]);
    }

    public function test_nao_cadastrar_produto_sem_nome(): void
    {
        $response = $this->post('/produtos', [
            'nome' => '',
            'categoria' => 'Bolos',
            'preco' => 35.00,
            'estoque' => 20,
            'estoque_minimo' => 5
        ]);

        $response->assertSessionHasErrors('nome');

        $this->assertDatabaseCount('produtos', 0);
    }
}
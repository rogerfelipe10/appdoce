<?php

namespace Tests\Unit;

use App\Models\Produto;
use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase
{
    public function test_identifica_estoque_baixo(): void
    {
        $produto = new Produto([
            'estoque' => 3,
            'estoque_minimo' => 5
        ]);

        $this->assertTrue($produto->estoqueBaixo());
    }

    public function test_estoque_suficiente(): void
    {
        $produto = new Produto([
            'estoque' => 10,
            'estoque_minimo' => 5
        ]);

        $this->assertFalse($produto->estoqueBaixo());
    }

    public function test_estoque_igual_ao_minimo(): void
    {
        $produto = new Produto([
            'estoque' => 5,
            'estoque_minimo' => 5
        ]);

        $this->assertFalse($produto->estoqueBaixo());
    }
}
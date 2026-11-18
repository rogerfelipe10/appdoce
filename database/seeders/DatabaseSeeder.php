<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Produto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $produtos = [
            ['Bolo de Chocolate', 'Bolos', 45.00, 12, 5],
            ['Brigadeiro Gourmet', 'Doces', 3.50, 120, 30],
            ['Torta de Limão', 'Tortas', 38.00, 8, 3],
            ['Coxinha', 'Salgados', 6.00, 40, 20],
            ['Suco de Laranja', 'Bebidas', 7.50, 25, 10],
        ];
        foreach ($produtos as [$nome, $cat, $preco, $est, $min]) {
            Produto::create(['nome' => $nome, 'categoria' => $cat, 'preco' => $preco, 'estoque' => $est, 'estoque_minimo' => $min]);
        }

        Cliente::create(['nome' => 'Maria Silva', 'contato' => '(11) 98888-1111', 'endereco' => 'Rua das Flores, 100']);
        Cliente::create(['nome' => 'João Souza', 'contato' => '(11) 97777-2222', 'endereco' => 'Av. Central, 250']);
    }
}

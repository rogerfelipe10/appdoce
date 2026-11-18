<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    public const CATEGORIAS = ['Bolos', 'Doces', 'Salgados', 'Tortas', 'Bebidas'];

    protected $fillable = ['nome', 'categoria', 'preco', 'estoque', 'estoque_minimo'];

    public function estoqueBaixo(): bool
    {
        return $this->estoque < $this->estoque_minimo;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Frete extends Model
{
    use HasFactory;

    public const STATUS = ['Preparando', 'Em trânsito', 'Entregue'];

    protected $fillable = ['pedido_id', 'endereco', 'taxa', 'data_prevista', 'rastreio', 'status'];

    protected $casts = ['data_prevista' => 'date:Y-m-d'];

    public function pedido(): BelongsTo
    {
        return $this->belongsTo(Pedido::class);
    }
}

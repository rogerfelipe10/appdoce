<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fretes', function (Blueprint $t) {
            $t->id();
            $t->foreignId('pedido_id')->constrained()->cascadeOnDelete();
            $t->string('endereco');
            $t->decimal('taxa', 8, 2);
            $t->date('data_prevista');
            $t->string('rastreio');
            $t->string('status')->default('Preparando');
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fretes');
    }
};

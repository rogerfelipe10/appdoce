<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $t) {
            $t->id();
            $t->foreignId('cliente_id')->constrained()->cascadeOnDelete();
            $t->foreignId('produto_id')->constrained()->cascadeOnDelete();
            $t->unsignedInteger('quantidade');
            $t->decimal('total', 10, 2);
            $t->string('status')->default('Pendente');
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};

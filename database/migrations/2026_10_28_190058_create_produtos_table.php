<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $t) {
            $t->id();
            $t->string('nome');
            $t->string('categoria');
            $t->decimal('preco', 8, 2);
            $t->unsignedInteger('estoque');
            $t->unsignedInteger('estoque_minimo')->default(0);
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};

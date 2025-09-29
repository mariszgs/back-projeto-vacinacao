<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vacinas', function (Blueprint $table) {
            // Remove a coluna antiga em dias
            $table->dropColumn('validade_dias');

            // Adiciona a nova em formato de data
            $table->date('validade')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('vacinas', function (Blueprint $table) {
            // Caso dê rollback, recria a antiga
            $table->integer('validade_dias')->nullable();
            $table->dropColumn('validade');
        });
    }
};

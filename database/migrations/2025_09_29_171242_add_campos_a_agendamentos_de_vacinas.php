<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('agendamentos_de_vacinas', function (Blueprint $table) {
        $table->foreignId('pet_id')->constrained('pets')->onDelete('cascade');
        $table->foreignId('vacina_id')->constrained('vacinas')->onDelete('cascade');
        $table->dateTime('data_agendada');
        $table->string('status')->default('pendente');
        $table->text('observacoes')->nullable();
    });
}

public function down()
{
    Schema::table('agendamentos_de_vacinas', function (Blueprint $table) {
        $table->dropForeign(['pet_id']);
        $table->dropForeign(['vacina_id']);
        $table->dropColumn(['pet_id', 'vacina_id', 'data_agendada', 'status', 'observacoes']);
    });
}

};

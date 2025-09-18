<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::create('pets', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); // Dono do pet
        $table->string('name');
        $table->string('species')->nullable(); // Ex: cão, gato
        $table->string('breed')->nullable();   // Raça
        $table->date('birthdate')->nullable(); // Data de nascimento
        $table->timestamps();

        // Relacionamento com users
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


public function down()
{
    Schema::dropIfExists('pets');
}

};

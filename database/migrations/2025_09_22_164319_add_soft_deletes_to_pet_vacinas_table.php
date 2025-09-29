<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Prompts\Table;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::table('pet_vacinas', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::table('pet_vacinas', function (Blueprint $table) {
            $table->softDeletes();
        });
    }
};

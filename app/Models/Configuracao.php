<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracao extends Model
{
    use HasFactory;

    protected $table = 'configuracoes';

    protected $fillable = [
        'nome',
        'valor',
    ];

    protected $casts = [
        'valor' => 'boolean', // converte automaticamente para true/false
    ];
}

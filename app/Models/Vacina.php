<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacina extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'validade_dias',
    ];

    public function petVacinas()
    {
        return $this->hasMany(PetVacina::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacina extends Model
{

    use SoftDeletes; 

    protected $fillable = [
        'nome',
        'descricao',
        'validade',
    ];

    public function petVacinas()
    {
        return $this->hasMany(PetVacina::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PetVacina extends Model
{
    use SoftDeletes;

     protected $fillable = [
        'user_id',
        'name',
        'species',
        'breed',
        'birthdate',
    ];

    // Vacinas já aplicadas
    public function vacinasAplicadas()
    {
        return $this->hasMany(Vacina::class);
    }

    // Vacinas agendadas (a tomar)
    public function agendamentos()
    {
        return $this->hasMany(AgendamentoDeVacina::class);
    }
}





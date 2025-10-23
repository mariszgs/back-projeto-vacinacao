<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use SoftDeletes;

 protected $fillable = [
    'user_id',
    'name',
    'species',
    'breed',
    'birthdate',
];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function petVacinas()
    {
        return $this->hasMany(PetVacina::class);
    }
    public function vacinasAplicadas()
{
    return $this->hasMany(\App\Models\PetVacina::class, 'pet_id');
}
    public function agendamentos()
{
    return $this->hasMany(AgendamentoDeVacina::class); // ou o nome do model correto
}


}

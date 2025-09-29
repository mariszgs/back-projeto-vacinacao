<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AgendamentoDeVacina extends Model
{
    use HasFactory;

    protected $table = 'agendamentos_de_vacinas';

    protected $fillable = [
        'pet_id',
        'vacina_id',
        'data_agendada',
        'status',
        'observacoes', 
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function vacina()
    {
        return $this->belongsTo(Vacina::class);
    }
}

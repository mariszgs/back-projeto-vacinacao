<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes; 

class AgendamentoDeVacina extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'agendamentos_de_vacinas';

    protected $fillable = [
        'pet_id',
        'vacina_id',
        'data_agendada',
        'status',
        'observacoes',
    ];

    protected $appends = ['vacina_nome'];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function vacina()
    {
        return $this->belongsTo(Vacina::class);
    }

    public function getVacinaNomeAttribute()
    {
        return $this->vacina ? $this->vacina->nome : null;
    }
}


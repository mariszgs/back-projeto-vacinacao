<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Testing\Fluent\Concerns\Has;

class Vacina extends Model
{

    use HasFactory , SoftDeletes; 
    
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

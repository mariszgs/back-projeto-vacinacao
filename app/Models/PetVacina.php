<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetVacina extends Model
{
    protected $fillable = [
        'pet_id', 'vacina_id', 'data_aplicacao', 'data_proxima_dose',
    ];

    public function pet()
    {
        return $this->belongsTo(\App\Models\Pet::class);
    }

    public function vacina()
    {
        return $this->belongsTo(\App\Models\Vacina::class);
    }
}





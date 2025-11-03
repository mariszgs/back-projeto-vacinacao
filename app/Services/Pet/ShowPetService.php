<?php

namespace App\Services\Pet;

use App\Models\Pet;
use Illuminate\Support\Facades\Auth;

class ShowPetService
{
    public function run(Pet $pet)
    {
        return $pet->load([
            'petVacinas.vacina',
            'agendamentos.vacina',
        ]);
    }
}

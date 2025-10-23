<?php

namespace App\Services\Pet;

use App\Models\Pet;
use Illuminate\Support\Facades\Auth;

class ShowPetService
{
    public function run(Pet $pet)
    {
        if ($pet->user_id !== Auth::id()) {
            abort(403, 'Acesso não autorizado.');
        }

        return $pet->load([
            'petVacinas.vacina',
            'agendamentos.vacina',
        ]);
    }
}

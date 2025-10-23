<?php

namespace App\Services\Pet;

use App\Models\Pet;
use Illuminate\Support\Facades\Auth;

class UpdatePetService
{
    public function run(array $data, Pet $pet): Pet
    {
        if ($pet->user_id !== Auth::id()) {
            abort(403, 'Acesso não autorizado.');
        }

        $pet->update($data);

        return $pet;
    }
}
    
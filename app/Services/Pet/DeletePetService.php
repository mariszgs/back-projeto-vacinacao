<?php

namespace App\Services\Pet;

use App\Models\Pet;
use Illuminate\Support\Facades\Auth;

class DeletePetService
{
    public function run(Pet $pet): void
    {
        if ($pet->user_id !== Auth::id()) {
            abort(403, 'Acesso não autorizado.');
        }

        $pet->delete();
    }
}

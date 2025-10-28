<?php

namespace App\Services\PetVacina;

use App\Models\PetVacina;

class ShowPetVacinaService
{
    public function run(int $id): PetVacina
    {
        return PetVacina::with(['pet', 'vacina'])->findOrFail($id);
    }
}
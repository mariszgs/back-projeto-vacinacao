<?php

namespace App\Services\PetVacina;

use App\Models\PetVacina;

class DeletePetVacinaService
{
    public function run(PetVacina $petVacina): void
    {
        $petVacina->delete();
    }
}
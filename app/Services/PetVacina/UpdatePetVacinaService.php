<?php

namespace App\Services\PetVacina;

use App\Models\PetVacina;

class UpdatePetVacinaService
{
    public function run(array $data, PetVacina $petVacina): PetVacina
    {
        $petVacina->update($data);
        return $petVacina;
    }
}
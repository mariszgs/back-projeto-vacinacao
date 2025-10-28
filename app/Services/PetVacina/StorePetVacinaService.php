<?php

namespace App\Services\PetVacina;

use App\Models\PetVacina;

class StorePetVacinaService
{
    public function run(array $data, int $petId): PetVacina
    {
        $data['pet_id'] = $petId;
        return PetVacina::create($data);
    }
}
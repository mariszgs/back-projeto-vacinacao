<?php

namespace App\Services\PetVacina;

use App\Models\PetVacina;
use Illuminate\Pagination\LengthAwarePaginator;

class IndexPetVacinaService
{
    public function run(int $petId, int $limit = 10): LengthAwarePaginator
    {
        return PetVacina::with('vacina:id,nome')
            ->where('pet_id', $petId)
            ->paginate($limit);
    }
}
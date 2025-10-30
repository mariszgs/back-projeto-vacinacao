<?php

namespace App\Services\PetVacina;

use App\Models\PetVacina;
use Illuminate\Http\Request;

class IndexPetVacinaService
{
    public function run(Request $request, int $petId)
    {
        $per_page = $request->query('per_page', 10);
        
        return PetVacina::with('vacina:id,nome')
            ->where('pet_id', $petId)
            ->paginate($per_page);
    }
}
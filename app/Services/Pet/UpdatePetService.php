<?php

namespace App\Services\Pet;

use App\Models\Pet;
use Illuminate\Support\Facades\Auth;

class UpdatePetService
{
    public function run(array $data, Pet $pet): Pet
    {
        $pet->update($data);

        return $pet;
    }
}
    
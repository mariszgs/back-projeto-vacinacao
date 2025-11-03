<?php

namespace App\Services\Pet;

use App\Models\Pet;
use Illuminate\Support\Facades\Auth;

class DeletePetService
{
    public function run(Pet $pet): void
    {
        $pet->delete();
    }
}

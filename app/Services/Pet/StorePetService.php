<?php

namespace App\Services\Pet;

use App\Models\Pet;
use Illuminate\Support\Facades\Auth;

class StorePetService
{
    public function run(array $data)
    {
        return Pet::create($data);
    }
}

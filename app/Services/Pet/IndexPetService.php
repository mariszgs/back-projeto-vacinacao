<?php

namespace App\Services\Pet;

use App\Models\Pet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IndexPetService
{
    public function run(Request $request)
    {
        $perPage = $request->get('per_page', 10); // Mudei de 'limit' para 'per_page'
        return Pet::paginate($perPage);
    }
}
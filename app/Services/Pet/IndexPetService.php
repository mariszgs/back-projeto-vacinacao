<?php

namespace App\Services\Pet;

use App\Models\Pet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IndexPetService
{
    public function run(Request $request)
    {
        $per_page = $request->query('per_page', 10);
        return Pet::where('user_id', Auth::id())->paginate($per_page);
    }
}

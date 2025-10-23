<?php

namespace App\Services\Pet;

use App\Models\Pet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IndexPetService
{
    public function run(Request $request)
    {
        $limit = $request->get('limit', 10);
        return Pet::where('user_id', Auth::id())->paginate($limit);
    }
}

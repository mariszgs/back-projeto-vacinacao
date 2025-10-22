<?php

namespace App\Services\Pet;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexPetService
{
    public function run(Request $request)
    {
        $limit = $request->get('limit', 10);
        return Pet::where('user_id', Auth::id())->paginate($limit);
    }
}

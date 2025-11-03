<?php 
namespace App\Services\Vacina;

use App\Models\Vacina;
use Illuminate\Http\Request;

class IndexVacinaService
{
    public function run(Request $request)
    {
        $perPage = $request->get('per_page', 10); // mudei de limit pra per_page
        return Vacina::orderBy('created_at')->paginate($perPage);
    }
}


    
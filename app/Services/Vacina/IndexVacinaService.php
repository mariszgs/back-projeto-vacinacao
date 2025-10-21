<?php 



namespace App\Services\Vacina;

use App\Models\Vacina;
use Illuminate\Http\Request;

class IndexVacinaService
{
    public function run(Request $request)
    {
        $limit = $request->get('limit', 10);
        // aqui pode incluir filtros, ordenação etc. se quiser
        return Vacina::paginate($limit);
    }
}



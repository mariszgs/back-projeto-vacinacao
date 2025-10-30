<?php 



namespace App\Services\Vacina;

use App\Models\Vacina;
use Illuminate\Http\Request;

class IndexVacinaService
{
    public function run(Request $request)
    {
        $per_page = $request->query('per_page', 10);
        // aqui pode incluir filtros, ordenação se quiser
        return Vacina::paginate($per_page);
    }
}


    
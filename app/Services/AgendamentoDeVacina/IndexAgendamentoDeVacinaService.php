<?php

namespace App\Services\AgendamentoDeVacina;

use Illuminate\Http\Request;
use App\Models\AgendamentoDeVacina;

class IndexAgendamentoDeVacinaService
{
    public function run(Request $request)
    {
        $perPage = $request->query('per_page', 10);
        return AgendamentoDeVacina::with(['pet', 'vacina'])->paginate($perPage);
    }
}

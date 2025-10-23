<?php

namespace App\Services\AgendamentoDeVacina;

use App\Models\AgendamentoDeVacina;

class StoreAgendamentoDeVacinaService
{
    public function run(array $data)
    {
        
        $data['status'] = 'pendente';

        return AgendamentoDeVacina::create($data);
    }
}

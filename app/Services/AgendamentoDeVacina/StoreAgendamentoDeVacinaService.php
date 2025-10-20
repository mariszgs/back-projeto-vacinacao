<?php

namespace App\Services\AgendamentoDeVacina;

use App\Models\AgendamentoDeVacina;

class StoreAgendamentoDeVacinaService
{
    public function run(array $data)
    {
        // Adiciona o status padrão 'pendente' e cria o agendamento
        $data['status'] = 'pendente';

        return AgendamentoDeVacina::create($data);
    }
}

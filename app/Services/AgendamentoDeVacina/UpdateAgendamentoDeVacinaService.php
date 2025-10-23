<?php

namespace App\Services\AgendamentoDeVacina;

use App\Models\AgendamentoDeVacina;

class UpdateAgendamentoDeVacinaService
{
    public function run(array $data, AgendamentoDeVacina $agendamento)
    {
        $agendamento->update($data);
        return $agendamento->refresh();
    }
}

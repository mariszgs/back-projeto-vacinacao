<?php

namespace App\Services\AgendamentoDeVacina;

use App\Models\AgendamentoDeVacina;

class DeleteAgendamentoDeVacinaService
{
public function run(AgendamentoDeVacina $agendamento)
{
    $agendamento->delete();
}

}

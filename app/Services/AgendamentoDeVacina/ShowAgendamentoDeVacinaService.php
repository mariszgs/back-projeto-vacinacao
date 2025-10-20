<?php

namespace App\Services\AgendamentoDeVacina;

use App\Models\AgendamentoDeVacina;

class ShowAgendamentoDeVacinaService
{
   public function run(AgendamentoDeVacina $agendamento)
{
    return $agendamento->load(['pet', 'vacina']);
}

}

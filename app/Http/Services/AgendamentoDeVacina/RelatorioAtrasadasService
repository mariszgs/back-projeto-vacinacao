<?php

namespace App\Services\AgendamentoDeVacina;

use App\Models\AgendamentoDeVacina;

class RelatorioAtrasadasService
{
    public function run()
    {
        $agendamentos = AgendamentoDeVacina::where('data_agendada', '<', now())
            ->where('status', 'pendente')
            ->with(['pet', 'vacina'])
            ->get();

        return [
            'total_atrasados' => $agendamentos->count(),
            'agendamentos' => $agendamentos,
        ];
    }
}

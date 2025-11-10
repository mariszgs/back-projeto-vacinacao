<?php

namespace App\Services\Configuracao;

use App\Models\Configuracao;

class UpdateOrCreateConfiguracaoService
{
    public function run(array $data)
    {
        return Configuracao::updateOrCreate(
            ['nome' => $data['nome']],
            ['valor' => $data['valor']]
        );
    }
}

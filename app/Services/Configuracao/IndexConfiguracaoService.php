<?php

namespace App\Services\Configuracao;

use App\Models\Configuracao;

class IndexConfiguracaoService
{
    public function run()
    {
        return Configuracao::all();
    }
}

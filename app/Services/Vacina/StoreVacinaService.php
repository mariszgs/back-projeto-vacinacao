<?php

namespace App\Services\Vacina;

use App\Models\Vacina;

class StoreVacinaService
{
    public function run(array $data)
    {
        return Vacina::create($data);
    }
}


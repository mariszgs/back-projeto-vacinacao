<?php


namespace App\Services\Vacina;

use App\Models\Vacina;

class ShowVacinaService
{
    public function run(int $id)
    {
        return Vacina::findOrFail($id);
    }
}

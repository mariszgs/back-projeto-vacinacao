<?php 


namespace App\Services\Vacina;

use App\Models\Vacina;

class UpdateVacinaService
{
    public function run(array $data, Vacina $vacina)
    {
        $vacina->update($data);
        return $vacina;
    }
}

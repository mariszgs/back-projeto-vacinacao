<?php 


namespace App\Services\Vacina;

use App\Models\Vacina;

class DeleteVacinaService
{
    public function run(Vacina $vacina)
    {
        $vacina->delete();
    }
}

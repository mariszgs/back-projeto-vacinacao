<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PetVacinaResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'pet_id' => $this->pet_id,
            'vacina_id' => $this->vacina_id,
            'vacina_nome' => $this->vacina->nome ?? null,
            'data_aplicacao' => $this->data_aplicacao,
            'data_proxima_dose' => $this->data_proxima_dose,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
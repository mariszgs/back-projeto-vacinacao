<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AgendamentoDeVacinaResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'pet' => $this->whenLoaded('pet'), // garante que vem com pet se carregado
            'vacina' => $this->whenLoaded('vacina'),
            'data_agendada' => $this->data_agendada,
            'status' => $this->status,
            'observacoes' => $this->observacoes,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

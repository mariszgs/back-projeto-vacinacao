<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class ConfiguracaoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'valor' => $this->valor,
            'criado_em' => $this->formatarData($this->created_at),
            'atualizado_em' => $this->formatarData($this->updated_at),
        ];
    }

    private function formatarData($data): ?string
    {
        if (!$data) {
            return null;
        }

        return Carbon::parse($data)
            ->timezone('America/Sao_Paulo')
            ->format('Y-m-d H:i:s');
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PetResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'species'   => $this->species,
            'breed'     => $this->breed,
            'birthdate' => $this->birthdate,
        ];
    }
}
    
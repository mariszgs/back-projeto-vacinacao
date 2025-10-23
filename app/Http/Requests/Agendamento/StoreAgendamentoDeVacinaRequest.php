<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAgendamentoDeVacinaRequest extends FormRequest
{
  
     public function rules(): array
    {
        return [
            'pet_id' => ['required','exists:pets,id'],
            'vacina_id' => ['required','exists:vacinas,id'],
            'data_agendada' => ['required','date','after:now'],
            'observacoes' => ['nullable','string'],
        ];
    }
}

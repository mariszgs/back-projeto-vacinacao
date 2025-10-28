<?php

namespace App\Http\Requests\PetVacinas;

use Illuminate\Foundation\Http\FormRequest;

class StorePetVacinaRequest extends FormRequest
{

    public function rules()
    {
        return [
            'vacina_id' => ['required', 'exists:vacinas,id'],
            'data_aplicacao' => ['required', 'date'],
            'data_proxima_dose' => ['nullable', 'date', 'after_or_equal:data_aplicacao'],
        ];
    }
}
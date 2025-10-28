<?php

namespace App\Http\Requests\PetVacinas;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePetVacinaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'pet_id' => ['sometimes', 'exists:pets,id'],
            'vacina_id' => ['sometimes', 'exists:vacinas,id'],
            'data_aplicacao' => ['sometimes', 'date'],
            'data_proxima_dose' => ['nullable', 'date', 'after_or_equal:data_aplicacao'],
        ];
    }
}
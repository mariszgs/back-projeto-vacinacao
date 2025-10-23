<?php

namespace App\Http\Requests\Pet;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePetRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name'      => ['sometimes','required','string'],
            'species'   => ['nullable','string'],
            'breed'     => ['nullable','string'],
            'birthdate' => ['nullable','date'],
        ];
    }
}

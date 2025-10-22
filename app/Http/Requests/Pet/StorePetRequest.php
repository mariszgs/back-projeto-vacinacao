<?php

namespace App\Http\Requests\Pet;

use Illuminate\Foundation\Http\FormRequest;

class StorePetRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name'      => ['required','string'],
            'species'   => ['nullable','string'],
            'breed'     => ['nullable','string'],
            'birthdate' => ['nullable','date'],
        ];
    }
}

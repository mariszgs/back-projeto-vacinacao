<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePetRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'      => 'sometimes|required|string|max:255',
            'species'   => 'nullable|string|max:100',
            'breed'     => 'nullable|string|max:100',
            'birthdate' => 'nullable|date',
        ];
    }
}

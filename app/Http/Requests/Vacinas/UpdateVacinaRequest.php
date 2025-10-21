<?php

// app/Http/Requests/UpdateVacinaRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVacinaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'sometimes|required|string|max:255',
            'descricao' => 'nullable|string',
            'validade' => 'nullable|date',
        ];
    }
}

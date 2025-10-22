<?php

namespace App\Http\Requests\Vacinas;

use Illuminate\Foundation\Http\FormRequest;

class StoreVacinaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => ['required','string'],
            'descricao' => ['nullable','string'],
            'validade' => ['required','date'],
        ];
    }
}

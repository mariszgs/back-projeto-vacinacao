<?php


namespace App\Http\Requests\Vacinas;

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
            'nome' => ['sometimes','required','string'],
            'descricao' => ['nullable','string'],
            'validade' => ['required','date'],
        ];
    }
}

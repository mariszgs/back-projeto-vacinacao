<?php

namespace App\Http\Requests\Configuracao;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrCreateConfiguracaoRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'nome' => ['required','string','max:255'],
            'valor' => ['required','boolean'],
        ];
    }
}

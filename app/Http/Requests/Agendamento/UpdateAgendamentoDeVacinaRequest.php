<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAgendamentoDeVacinaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
{
    return [
        'data_agendada' => 'sometimes|date|after:now',
        'status' => 'sometimes|in:pendente,concluído,cancelado',
        'observacoes' => 'nullable|string',
    ];
}

}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAgendamentoDeVacinaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
     public function rules()
    {
        return [
            'pet_id' => 'required|exists:pets,id',
            'vacina_id' => 'required|exists:vacinas,id',
            'data_agendada' => 'required|date|after:now',
            'observacoes' => 'nullable|string',
        ];
    }
}

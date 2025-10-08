<?php

namespace App\Http\Controllers;

use App\Models\AgendamentoDeVacina;
use Illuminate\Http\Request;

class AgendamentoDeVacinaController extends Controller
{
    public function index()
    {
        return AgendamentoDeVacina::with(['pet', 'vacina'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'vacina_id' => 'required|exists:vacinas,id',
            'data_agendada' => 'required|date|after:now',
            'observacoes' => 'nullable|string',
        ]);

        $agendamento = AgendamentoDeVacina::create([
            'pet_id' => $request->pet_id,
            'vacina_id' => $request->vacina_id,
            'data_agendada' => $request->data_agendada,
            'status' => 'pendente',
            'observacoes' => $request->observacoes,
        ]);

        return response()->json($agendamento, 201);
    }

    public function show($id)
    {
        return AgendamentoDeVacina::with(['pet', 'vacina'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $agendamento = AgendamentoDeVacina::findOrFail($id);

        $request->validate([
            'data_agendada' => 'sometimes|date|after:now',
            'status' => 'sometimes|in:pendente,concluído,cancelado',
            'observacoes' => 'nullable|string',
        ]);

        $agendamento->update($request->all());

        return response()->json($agendamento);
    }

    public function destroy($id)
    {
        $agendamento = AgendamentoDeVacina::findOrFail($id);
        $agendamento->delete();

        return response()->json(null, 204);
    }

public function relatorioAtrasadas()
{
    $agendamentos = AgendamentoDeVacina::where('data_agendada', '<', now())
        ->where('status', 'pendente') // apenas os que ainda não foram realizados
        ->with(['pet', 'vacina'])
        ->get();

    return response()->json([
        'total_atrasados' => $agendamentos->count(),
        'agendamentos' => $agendamentos
    ]);
}
}

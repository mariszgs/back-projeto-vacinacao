<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreAgendamentoDeVacinaRequest;
use App\Http\Requests\UpdateAgendamentoDeVacinaRequest;
use App\Http\Resources\AgendamentoDeVacinaResource;
use App\Services\AgendamentoDeVacina\StoreAgendamentoDeVacinaService;
use App\Services\AgendamentoDeVacina\IndexAgendamentoDeVacinaService;
use App\Services\AgendamentoDeVacina\UpdateAgendamentoDeVacinaService;
use App\Services\AgendamentoDeVacina\DeleteAgendamentoDeVacinaService;
use App\Services\AgendamentoDeVacina\ShowAgendamentoDeVacinaService;
use App\Services\AgendamentoDeVacina\RelatorioAtrasadasService;
use Illuminate\Http\Request;
use App\Models\AgendamentoDeVacina;

class AgendamentoDeVacinaController extends Controller
{
    public function store(StoreAgendamentoDeVacinaRequest $request, StoreAgendamentoDeVacinaService $service)
    {
        $data = $request->validated();
        $agendamento = $service->run($data);
        return response(new AgendamentoDeVacinaResource($agendamento), 201);
    }

   
    public function index(IndexAgendamentoDeVacinaService $service, Request $request)
    {
        $agendamentos = $service->run($request);
        return AgendamentoDeVacinaResource::collection($agendamentos);
    }

    public function show(ShowAgendamentoDeVacinaService $service, $id)
{
    $agendamento = $service->run($id);
    return new AgendamentoDeVacinaResource($agendamento);
}


 public function update(UpdateAgendamentoDeVacinaRequest $request, UpdateAgendamentoDeVacinaService $service, $id)
{
    $agendamento = AgendamentoDeVacina::findOrFail($id);
    $data = $request->validated();
    $agendamento = $service->run($data, $agendamento);

    return new AgendamentoDeVacinaResource($agendamento);
}

    public function destroy(DeleteAgendamentoDeVacinaService $service, $id)
{
    $service->run($id);
    return response()->json(null, 204);
}

public function relatorioAtrasadas(RelatorioAtrasadasService $service)
{
    $resultado = $service->run();

    return response()->json([
        'total_atrasados' => $resultado['total_atrasados'],
        'agendamentos' => AgendamentoDeVacinaResource::collection($resultado['agendamentos']),
    ]);
}
}
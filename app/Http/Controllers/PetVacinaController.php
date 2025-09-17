<?php

namespace App\Http\Controllers;

use App\Models\PetVacina;
use Illuminate\Http\Request;

class PetVacinaController extends Controller
{
    // Lista todas as vacinas aplicadas (com paginação)
    public function index()
    {
        $petVacinas = PetVacina::with(['pet', 'vacina'])->paginate(10);
        return response()->json($petVacinas);
    }

    // Cria um novo registro de vacina aplicada a um pet
   public function store(Request $request)
{
    $request->validate([
        'pet_id' => 'required|exists:pets,id',
        'vacina_id' => 'required|exists:vacinas,id',
        'data_aplicacao' => 'required|date',
        'data_proxima_dose' => 'nullable|date|after_or_equal:data_aplicacao',
    ]);

    $petVacina = PetVacina::create($request->all());

    return response()->json($petVacina, 201);
}


    // Mostra um registro específico
    public function show($id)
    {
        $petVacina = PetVacina::with(['pet', 'vacina'])->findOrFail($id);
        return response()->json($petVacina);
    }

    // Atualiza um registro existente
    public function update(Request $request, $id)
    {
        $petVacina = PetVacina::findOrFail($id);

        $request->validate([
    'pet_id' => 'sometimes|exists:pets,id',
    'vacina_id' => 'sometimes|exists:vacinas,id',
    'data_aplicacao' => 'sometimes|date',
    'data_proxima_dose' => 'nullable|date|after_or_equal:data_aplicacao',
]);


        $petVacina->update($request->all());

        return response()->json($petVacina);
    }

    // Remove um registro
    public function destroy($id)
    {
        $petVacina = PetVacina::findOrFail($id);
        $petVacina->delete();

        return response()->json(['message' => 'Registro removido com sucesso!']);
    }
}

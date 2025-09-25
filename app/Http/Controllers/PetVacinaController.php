<?php

namespace App\Http\Controllers;

use App\Models\PetVacina;
use Illuminate\Http\Request;

class PetVacinaController extends Controller
{
    // Lista todas as vacinas aplicadas (com paginação)
   public function index(Request $request, $pet)
{
    $limit = $request->get('limit', 10);

    $petVacinas = PetVacina::where('pet_id', $pet)->paginate($limit);

    return response()->json([
        'count' => count($petVacinas->items()),
        'items' => $petVacinas->items()
    ]);
}


    // Cria um novo registro de vacina aplicada a um pet
   public function store(Request $request, $pet)
{
    $request->validate([
        'vacina_id' => 'required|exists:vacinas,id',
        'data_aplicacao' => 'required|date',
        'data_proxima_dose' => 'nullable|date|after_or_equal:data_aplicacao',
    ]);

    $petVacina = PetVacina::create([
        'pet_id' => $pet, // <- vem da rota pets/{pet}/vacinas
        'vacina_id' => $request->vacina_id,
        'data_aplicacao' => $request->data_aplicacao,
        'data_proxima_dose' => $request->data_proxima_dose,
    ]);

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

    // Remove um registro (soft delete)
    public function destroy($id)
    {
        $petVacina = PetVacina::findOrFail($id);
        $petVacina->delete();

        return response()->json(['message' => 'Registro removido com sucesso (soft delete)!'], 200);
    }
}

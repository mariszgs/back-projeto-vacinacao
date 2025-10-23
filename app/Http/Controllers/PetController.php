<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    // Listar todos os pets
    public function index(Request $request)
    {
        $limit = $request->get('limit', 10); // limite do paginate
        $pets = Pet::paginate($limit);

        return response()->json([
            'count' => count($pets->items()),
            'items' => $pets->items()
        ]);
    }

    // Mostrar um pet específico
    public function show($id)
    {
        $pet = Pet::with([
            'vacinasAplicadas.vacina', // vacinas aplicadas
            'agendamentos.vacina'      // vacinas a tomar / agendadas
        ])->findOrFail($id);

        return response()->json([
            'id' => $pet->id,
            'name' => $pet->name,
            'species' => $pet->species,
            'birthdate' => $pet->birthdate,
            'vacinas_aplicadas' => $pet->vacinasAplicadas,
            'vacinas_agendadas' => $pet->agendamentos
        ]);
    }

    // Criar um novo pet
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'species'   => 'nullable|string|max:100',
            'breed'     => 'nullable|string|max:100',
            'birthdate' => 'nullable|date',
        ]);

        $pet = Pet::create([
            'user_id'   => Auth::id(),
            'name'      => $request->name,
            'species'   => $request->species,
            'breed'     => $request->breed,
            'birthdate' => $request->birthdate,
        ]);

        return response()->json($pet, 201);
    }

    // Atualizar um pet existente
    public function update(Request $request, $id)
    {
        $pet = Pet::findOrFail($id); // removido filtro pelo user_id

        $request->validate([
            'name'      => 'sometimes|required|string|max:255',
            'species'   => 'nullable|string|max:100',
            'breed'     => 'nullable|string|max:100',
            'birthdate' => 'nullable|date',
        ]);

        $pet->update($request->only(['name', 'species', 'breed', 'birthdate']));

        return response()->json($pet);
    }

    // Deletar um pet
    public function destroy($id)
    {
        $pet = Pet::findOrFail($id); // removido filtro pelo user_id
        $pet->delete();

        return response()->json(['message' => 'Pet excluído com sucesso!'], 200);
    }
}

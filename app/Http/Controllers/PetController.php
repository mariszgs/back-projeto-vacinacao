<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    // Listar todos os pets do usuário autenticado
    public function index()
    {
        $pets = Pet::where('user_id', Auth::id())->get();
        return response()->json($pets);
    }

    // Mostrar um pet específico do usuário autenticado
    public function show($id)
    {
        $pet = Pet::where('user_id', Auth::id())->findOrFail($id);
        return response()->json($pet);
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
        $pet = Pet::where('user_id', Auth::id())->findOrFail($id);

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
        $pet = Pet::where('user_id', Auth::id())->findOrFail($id);
        $pet->delete();

        return response()->json(null, 204);
    }
}

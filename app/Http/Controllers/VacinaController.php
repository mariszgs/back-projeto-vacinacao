<?php

namespace App\Http\Controllers;

use App\Models\Vacina;
use Illuminate\Http\Request;

class VacinaController extends Controller
{
    // LISTAR TODAS AS VACINAS
    public function index(Request $request)
    {
        $limit = $request->get('limit', 10);
        $vacinas = Vacina::paginate($limit);

        return response()->json([
            'count' => count($vacinas->items()),
            'items' => $vacinas->items()
        ]);
    }

    // MOSTRAR UMA VACINA ESPECÍFICA PELO ID
    public function show($id)
    {
        $vacina = Vacina::findOrFail($id);
        return response()->json($vacina);
    }

    // CRIAR UMA NOVA VACINA 
      
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'validade' => 'nullable|date', // <-- agora espera data
        ]);

        $vacina = Vacina::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'validade' => $request->validade, // <-- salva data
        ]);

        return response()->json($vacina, 201);
    }

    // ATUALIZAR UMA VACINA EXISTENTE
    public function update(Request $request, $id)
    {
        $vacina = Vacina::findOrFail($id);

        $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'descricao' => 'nullable|string',
            'validade' => 'nullable|date', // <-- agora data também
        ]);

        $vacina->update($request->only(['nome', 'descricao', 'validade']));

        return response()->json($vacina);
    }

    // DELETAR UMA VACINA (soft delete)
    public function destroy($id)
    {
        $vacina = Vacina::findOrFail($id);
        $vacina->delete();

        return response()->json(['message' => 'Vacina excluída (soft delete)!'], 200);
    }

    // LISTAR VACINAS EXCLUÍDAS
    public function deleted()
    {
        $vacinas = Vacina::onlyTrashed()->get();
        return response()->json($vacinas);
    }

    // RESTAURAR VACINA
    public function restore($id)
    {
        $vacina = Vacina::onlyTrashed()->findOrFail($id);
        $vacina->restore();

        return response()->json(['message' => 'Vacina restaurada!', 'data' => $vacina]);
    }

    // EXCLUIR PERMANENTEMENTE
    public function forceDelete($id)
    {
        $vacina = Vacina::onlyTrashed()->findOrFail($id);
        $vacina->forceDelete();

        return response()->json(['message' => 'Vacina excluída permanentemente!']);
    }
}

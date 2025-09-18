<?php

namespace App\Http\Controllers;

use App\Models\Vacina;
use Illuminate\Http\Request;

class VacinaController extends Controller
{
    // LISTAR TODAS AS VACINAS
    public function index()
    {
        $vacinas = Vacina::all(); // pega todas as vacinas do banco
        return response()->json($vacinas);
    }

    // MOSTRAR UMA VACINA ESPECÍFICA PELO ID
    public function show($id)
    {
        $vacina = Vacina::findOrFail($id); // se não encontrar, retorna 404
        return response()->json($vacina);
    }

    // CRIAR UMA NOVA VACINA
    public function store(Request $request)
    {
        // Validação simples
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        // Cria a vacina
        $vacina = Vacina::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
        ]);

        return response()->json($vacina, 201); // 201 = criado com sucesso
    }

    // ATUALIZAR UMA VACINA EXISTENTE
    public function update(Request $request, $id)
    {
        $vacina = Vacina::findOrFail($id);

        // Validação opcional 
        $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        $vacina->update($request->only(['nome', 'descricao']));

        return response()->json($vacina); // retorna a vacina atualizada
    }

    // DELETAR UMA VACINA
    public function destroy($id)
    {
        $vacina = Vacina::findOrFail($id);
        $vacina->delete();

        return response()->json(null, 204); // 204 = sem conteúdo, sucesso
    }
}

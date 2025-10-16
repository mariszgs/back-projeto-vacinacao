<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
     return response()->json(Auth::user());
    }

    //atualizar usuario
      public function update(Request $request)
    {
        $user = $request->user(); // usuário logado

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|min:6|confirmed',
        ]);
        if ($request->has('name')){
            $user->name = $request->name;
        }
        if ($request->has('email')){
            $user->email = $request->email;
        }
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        
        $user->save();

       return response()->json(['message' => 'Usuário atualizado com sucesso!', 'user' => $user]);
    }

   
    public function destroy()
{
    /** @var \App\Models\User $user */
    $user = Auth::user();
    $user->delete();

    return response()->json(['message' => 'Conta excluída com sucesso!']);
}


}

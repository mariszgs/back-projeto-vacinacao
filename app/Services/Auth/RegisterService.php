<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterService
{
    public function run(array $data)
    {
        // Criar usuário
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Criar token de autenticação
        $token = $user->createToken('auth_token')->plainTextToken;

        // Retornar dados que o controller vai enviar na resposta
        return [
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ];
    }
}

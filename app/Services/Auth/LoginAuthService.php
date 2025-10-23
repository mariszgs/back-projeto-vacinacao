<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginAuthService
{
    public function run(array $data)
    {
        $user = User::where('email', $data['email'])->first();

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            abort(401, 'Credenciais inválidas.');
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'token' => $token,
        ];
    }
}

<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Auth;

class LogoutService
{
    public function run()
    {
        $user = Auth::user();
        if ($user) {
            $user->currentAccessToken()->delete(); // método do Sanctum
            return ['message' => 'Logout realizado!'];
        }

        return ['message' => 'Nenhum usuário autenticado.'];
    }
}

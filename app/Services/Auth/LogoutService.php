<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;

class LogoutService
{
    public function run(): array
    {
        /** @var User|null $user */
        $user = Auth::user();

        if ($user) {
            /** @var PersonalAccessToken|null $token */
            $token = $user->currentAccessToken();

            if ($token) {
                $token->delete();
            }

            return ['message' => 'Logout realizado com sucesso!'];
        }

        return ['message' => 'Nenhum usuário autenticado.'];
    }
}

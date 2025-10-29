<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateUserService
{
    public function run(array $data, User $user)
    {
        // Se a senha foi enviada, aplica o hash
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            // Se o campo vier vazio, não atualiza a senha
            unset($data['password']);
        }

        $user->update($data);

        return $user;
    }
}

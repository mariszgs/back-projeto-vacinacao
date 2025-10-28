<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateUserService
{
    public function run(array $data, User $user)
    {
        $user->update($data);
        return $user;
    }
}
<?php 
namespace App\Services\User;

use App\Models\User;

class DeleteUserService
{
    public function run(User $user)
    {
        $user->delete();
    }
}
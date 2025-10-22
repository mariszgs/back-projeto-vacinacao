<?php

namespace App\Services\Pet;

use App\Models\Pet;
use Illuminate\Support\Facades\Auth;

class StorePetService
{
    public function run(array $data): Pet
{
    dd(Auth::id()); // Isso vai parar aqui e mostrar o ID do usuário (ou null)
    
    $data['user_id'] = Auth::id();
    return Pet::create($data);
}

}

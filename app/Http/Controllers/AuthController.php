<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterAuthRequest;
use App\Services\Auth\LoginService;
use App\Services\Auth\LogoutService;
use App\Services\Auth\RegisterService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterAuthRequest $request, RegisterService $service)
    {
        // O RegisterRequest já valida os dados
        $data = $request->validated();

        // O service executa o registro e retorna resposta pronta (array ou JsonResponse)
        $response = $service->run($data);

        // Só devolvemos a resposta
        return response()->json($response, 201);
    }

    public function login(LoginRequest $request, LoginService $service)
    {
        $data = $request->validated();

        $response = $service->run($data);

        return response()->json($response);
    }

    public function logout(Request $request, LogoutService $service)
    {
        $response = $service->run($request);

        return response()->json($response);
    }
}

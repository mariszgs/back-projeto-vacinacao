<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\LoginService;
use App\Services\Auth\LogoutService;
use App\Services\Auth\RegisterService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
   public function register(RegisterRequest $request, RegisterService $service)
{
    $data = $request->validated();
    $user = $service->run($data);
    return response($user);
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

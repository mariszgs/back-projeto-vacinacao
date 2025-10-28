<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Services\User\UpdateUserService;
use App\Services\User\DeleteUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();
        return new UserResource($user);
    }

    //atualizar usuario
      public function update(UpdateUserRequest $request, UpdateUserService $service)
    {
        $data = $request->validated();
        $user = $request->user();
        $updatedUser = $service->run($data, $user);
        return new UserResource($updatedUser);
    }

   
 public function destroy(DeleteUserService $service)
    {
        $user = Auth::user();
        $service->run($user);

        return response()->json(null, 204);
    }


}

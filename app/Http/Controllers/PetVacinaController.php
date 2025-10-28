<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetVacinas\StorePetVacinaRequest;
use App\Http\Requests\PetVacinas\UpdatePetVacinaRequest;
use App\Http\Resources\PetVacinaResource;
use App\Services\PetVacina\IndexPetVacinaService;
use App\Services\PetVacina\StorePetVacinaService;
use App\Services\PetVacina\ShowPetVacinaService;
use App\Services\PetVacina\UpdatePetVacinaService;
use App\Services\PetVacina\DeletePetVacinaService;
use App\Models\PetVacina;
use Illuminate\Http\Request;

class PetVacinaController extends Controller
{
    public function index(
        Request $request, 
        int $pet, 
        IndexPetVacinaService $service
    ) {
        $limit = $request->get('limit', 10);
        $petVacinas = $service->run($pet, $limit);

        return PetVacinaResource::collection($petVacinas);
    }

    public function store(
        StorePetVacinaRequest $request, 
        int $pet, 
        StorePetVacinaService $service
    ) {
        $data = $request->validated();
        $petVacina = $service->run($data, $pet);

        return response(new PetVacinaResource($petVacina), 201);
    }

    public function show(int $id, ShowPetVacinaService $service)
    {
        $petVacina = $service->run($id);
        return new PetVacinaResource($petVacina);
    }

    public function update(
        UpdatePetVacinaRequest $request, 
        int $id, 
        UpdatePetVacinaService $service
    ) {
        $data = $request->validated();
        $petVacina = PetVacina::findOrFail($id);
        $updatedPetVacina = $service->run($data, $petVacina);

        return new PetVacinaResource($updatedPetVacina);
    }

    public function destroy(int $id, DeletePetVacinaService $service)
    {
        $petVacina = PetVacina::findOrFail($id);
        $service->run($petVacina);

        return response()->json(null, 204);
    }
}
<?php 

namespace App\Http\Controllers;

use App\Http\Requests\Vacinas\StoreVacinaRequest;
use App\Http\Requests\Vacinas\UpdateVacinaRequest;
use App\Http\Resources\VacinaResource;
use App\Models\Vacina;
use App\Services\Vacina\IndexVacinaService;
use App\Services\Vacina\ShowVacinaService;
use App\Services\Vacina\StoreVacinaService;
use App\Services\Vacina\UpdateVacinaService;
use App\Services\Vacina\DeleteVacinaService;
use Illuminate\Http\Request;

class VacinaController extends Controller
{

    public function index(IndexVacinaService $service, Request $request)
{
    $vacinas = $service->run($request);
    return VacinaResource::collection($vacinas);
}

    public function show(int $id, ShowVacinaService $service)
    {
        $vacina = $service->run($id);
        return new VacinaResource($vacina);
    }

    public function store(StoreVacinaRequest $request, StoreVacinaService $service)
    {
        $data = $request->validated();
        $vacina = $service->run($data);

        return response(new VacinaResource($vacina), 201);
    }

    public function update(StoreVacinaRequest $request, Vacina $vacina)
{
    $data = $request->validated();
    $vacina->update($data);

    return response(new VacinaResource($vacina), 200);
}

    public function destroy(DeleteVacinaService $service, Vacina $vacina)
    {
        $service->run($vacina);
        return response()->json(null, 204);
    }
}

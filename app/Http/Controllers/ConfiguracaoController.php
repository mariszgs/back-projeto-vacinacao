<?php

namespace App\Http\Controllers;

use App\Http\Requests\Configuracao\UpdateOrCreateConfiguracaoRequest;
use App\Http\Resources\ConfiguracaoResource;
use App\Services\Configuracao\IndexConfiguracaoService;
use App\Services\Configuracao\UpdateOrCreateConfiguracaoService;

class ConfiguracaoController extends Controller
{
    protected IndexConfiguracaoService $indexService;
    protected UpdateOrCreateConfiguracaoService $updateService;

    public function __construct(
        IndexConfiguracaoService $indexService,
        UpdateOrCreateConfiguracaoService $updateService
    ) {
        $this->indexService = $indexService;
        $this->updateService = $updateService;
    }

    public function index()
    {
        $configuracoes = $this->indexService->run();

        return ConfiguracaoResource::collection($configuracoes);
    }

    public function updateOrCreate(UpdateOrCreateConfiguracaoRequest $request)
    {
        $config = $this->updateService->run($request->validated());

        return new ConfiguracaoResource($config);
    }
}

<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\VacinaController;
use App\Http\Controllers\PetVacinaController;

// Rotas públicas
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rotas protegidas por Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Pets
    Route::apiResource('pets', PetController::class);

    // Vacinas
    Route::apiResource('vacinas', VacinaController::class);

    // Vacinas aplicadas em Pets
    Route::get('pets/{pet}/vacinas', [PetVacinaController::class, 'index']);
    Route::post('pets/{pet}/vacinas', [PetVacinaController::class, 'store']);
    Route::delete('pets/{pet}/vacinas/{vacina}', [PetVacinaController::class, 'destroy']);

   Route::get('/forcar-erro', function () {
    throw new Exception('Teste de erro');
});

});

<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Vacina;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VacinaControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function usuario_autenticado_pode_criar_uma_vacina()
    {
        Sanctum::actingAs(User::factory()->create());

        $response = $this->postJson('/api/vacinas', [
            'nome' => 'Raiva',
            'descricao' => 'Vacina contra raiva animal',
            'validade' => '2026-10-07',
        ]);

        $response->assertStatus(201)
                 ->assertJsonFragment(['nome' => 'Raiva']);
    }

    /** @test */
    public function usuario_autenticado_pode_listar_vacinas()
    {
        Sanctum::actingAs(User::factory()->create());

        Vacina::factory()->create(['nome' => 'Antirrábica']);

        $response = $this->getJson('/api/vacinas');

        $response->assertStatus(200)
                 ->assertJsonFragment(['nome' => 'Antirrábica']);
    }

    /** @test */
    public function usuario_autenticado_pode_atualizar_vacina()
    {
        Sanctum::actingAs(User::factory()->create());

        $vacina = Vacina::factory()->create(['nome' => 'Antiga']);

        $response = $this->putJson("/api/vacinas/{$vacina->id}", [
            'nome' => 'Atualizada'
        ]);

        $response->assertStatus(200)
                 ->assertJsonFragment(['nome' => 'Atualizada']);
    }

    /** @test */
    public function usuario_autenticado_pode_deletar_vacina()
    {
        Sanctum::actingAs(User::factory()->create());

        $vacina = Vacina::factory()->create();

        $response = $this->deleteJson("/api/vacinas/{$vacina->id}");

        $response->assertStatus(200);

        $this->assertSoftDeleted('vacinas', ['id' => $vacina->id]);
    }
}

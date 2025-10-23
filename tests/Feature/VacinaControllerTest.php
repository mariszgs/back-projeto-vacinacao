<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Vacina;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VacinaControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        // Cria um usuário autenticado
        $this->user = User::factory()->create();
    }

    /** @test */
    public function usuario_autenticado_pode_criar_uma_vacina()
    {
        $this->actingAs($this->user, 'sanctum');

        $data = [
            'nome' => 'Vacina Antirrábica',
            'descricao' => 'Protege contra raiva',
            'validade' => '2025-12-31',
        ];

        $response = $this->postJson('/api/vacinas', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment(['nome' => 'Vacina Antirrábica']);

        $this->assertDatabaseHas('vacinas', ['nome' => 'Vacina Antirrábica']);
    }

    /** @test */
    public function usuario_autenticado_pode_listar_vacinas()
    {
        $this->actingAs($this->user, 'sanctum');

        Vacina::factory()->count(3)->create();

        $response = $this->getJson('/api/vacinas?limit=5&page=1');

        $response->assertStatus(200)
                 ->assertJsonStructure(['count', 'items']);
    }

    /** @test */
    public function usuario_autenticado_pode_atualizar_vacina()
    {
        $this->actingAs($this->user, 'sanctum');

        $vacina = Vacina::factory()->create([
            'nome' => 'Vacina A',
            'descricao' => 'Original',
        ]);

        $data = [
            'nome' => 'Vacina Atualizada',
            'descricao' => 'Nova descrição',
        ];

        $response = $this->putJson("/api/vacinas/{$vacina->id}", $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['nome' => 'Vacina Atualizada']);

        $this->assertDatabaseHas('vacinas', ['nome' => 'Vacina Atualizada']);
    }

    /** @test */
    public function usuario_autenticado_pode_deletar_vacina()
    {
        $this->actingAs($this->user, 'sanctum');

        $vacina = Vacina::factory()->create();

        $response = $this->deleteJson("/api/vacinas/{$vacina->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['message' => 'Vacina excluída com sucesso (soft delete)!']);

        $this->assertSoftDeleted('vacinas', ['id' => $vacina->id]);
    }
}

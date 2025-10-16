<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Vacina;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VacinaControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function usuario_pode_criar_uma_vacina()
    {
        $dados = [
            'nome' => 'Vacina Teste',
            'descricao' => 'Protege contra teste agudo',
            'validade' => '2025-12-31',
        ];

        $response = $this->postJson('/api/vacinas', $dados);

        $response->assertStatus(201)
                 ->assertJsonFragment(['nome' => 'Vacina Teste']);

        $this->assertDatabaseHas('vacinas', ['nome' => 'Vacina Teste']);
    }

    /** @test */
    public function usuario_pode_listar_vacinas()
    {
        Vacina::factory()->count(3)->create();

        $response = $this->getJson('/api/vacinas');

        $response->assertStatus(200)
                 ->assertJsonStructure(['count', 'items']);
    }

    /** @test */
    public function usuario_pode_ver_uma_vacina()
    {
        $vacina = Vacina::factory()->create();

        $response = $this->getJson("/api/vacinas/{$vacina->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['id' => $vacina->id]);
    }

    /** @test */
    public function usuario_pode_atualizar_uma_vacina()
    {
        $vacina = Vacina::factory()->create();

        $dadosAtualizados = [
            'nome' => 'Vacina Atualizada',
            'descricao' => 'Nova descrição',
            'validade' => '2026-01-01',
        ];

        $response = $this->putJson("/api/vacinas/{$vacina->id}", $dadosAtualizados);

        $response->assertStatus(200)
                 ->assertJsonFragment(['nome' => 'Vacina Atualizada']);

        $this->assertDatabaseHas('vacinas', ['nome' => 'Vacina Atualizada']);
    }

    /** @test */
    public function usuario_pode_excluir_uma_vacina_com_soft_delete()
    {
        $vacina = Vacina::factory()->create();

        $response = $this->deleteJson("/api/vacinas/{$vacina->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['message' => 'Vacina excluída com sucesso (soft delete)!']);

        $this->assertSoftDeleted('vacinas', ['id' => $vacina->id]);
    }

    /** @test */
    public function usuario_pode_listar_vacinas_excluidas()
    {
        $vacina = Vacina::factory()->create();
        $vacina->delete();

        $response = $this->getJson('/api/vacinas/deleted');

        $response->assertStatus(200)
                 ->assertJsonFragment(['id' => $vacina->id]);
    }

    /** @test */
    public function usuario_pode_restaurar_vacina_excluida()
    {
        $vacina = Vacina::factory()->create();
        $vacina->delete();

        $response = $this->postJson("/api/vacinas/{$vacina->id}/restore");

        $response->assertStatus(200)
                 ->assertJsonFragment(['message' => 'Vacina restaurada com sucesso!']);

        $this->assertDatabaseHas('vacinas', ['id' => $vacina->id, 'deleted_at' => null]);
    }

    /** @test */
    public function usuario_pode_excluir_permanentemente_uma_vacina()
    {
        $vacina = Vacina::factory()->create();
        $vacina->delete();

        $response = $this->deleteJson("/api/vacinas/{$vacina->id}/force-delete");

        $response->assertStatus(200)
                 ->assertJsonFragment(['message' => 'Vacina excluída permanentemente!']);

        $this->assertDatabaseMissing('vacinas', ['id' => $vacina->id]);
    }
}

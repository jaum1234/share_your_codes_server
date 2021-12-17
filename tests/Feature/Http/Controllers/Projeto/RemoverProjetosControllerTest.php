<?php

namespace Tests\Feature\Http\Controllers\Projeto;

use Tests\TestCase;
use App\Models\User;
use App\Models\Projeto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tymon\JWTAuth\Facades\JWTAuth;

class RemoverProjetosControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_deve_excluir_projeto()
    {
        $this->withoutExceptionHandling();

        //Arrange
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);

        $projeto = $user->projetos()->save(Projeto::factory()->make());

        //Act
        $response = $this->delete(route(
            'projetos.destroy', 
            ['id' => $projeto->id],
        ), [], ['Authorization' => 'Bearer ' . $token]);

        //Assert
        $response->assertStatus(204);
       
        $this->assertDatabaseMissing('projetos', [
            'nome' => $projeto->nome,
            'descricao' => $projeto->descricao,
            'codigo' => $projeto->codigo,
            'cor' => $projeto->cor
        ]);
    }
}

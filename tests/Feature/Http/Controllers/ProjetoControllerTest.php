<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\User;
use App\Models\Projeto;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjetoControllerTest extends TestCase
{
    use RefreshDatabase;

    

    

    

    public function test_deve_excluir_projeto()
    {
        $this->withoutExceptionHandling();

        //Arrange
        $user = User::factory()->create();
        $this->actingAs($user);

        $projeto = $user->projetos()->save(Projeto::factory()->make());

        //Act
        $response = $this->post("/projetos/excluir/" . $projeto->id );

        //Assert
        $response->assertStatus(302);

        $this->assertDatabaseMissing('projetos', [
            'nome' => $projeto->nome,
            'descricao' => $projeto->descricao,
            'codigo' => $projeto->codigo,
            'cor' => $projeto->cor
        ]);
    }

    

}

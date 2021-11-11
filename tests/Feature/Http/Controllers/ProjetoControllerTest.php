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

    public function test_deve_renderizar_pagina_da_comunidade()
    {
        $this->withoutExceptionHandling();

        //Arrange & Act
        $response = $this->get('/projetos');

        //Assert
        $response->assertStatus(200);
        $response->assertViewIs('editor.comunidade');
        $response->assertViewHas('projetos');
    }

    

    public function test_deve_renderizar_pagina_do_projeto()
    {
        $this->withoutExceptionHandling();

        //Arrange
        $user = User::factory()->create();
        $projeto = $user->projetos()->save(Projeto::factory()->make());

        //Act
        $response = $this->get("/projetos/" . $projeto->id . "/" . $projeto->nome);

        //Assert
        $response->assertStatus(200);
        $response->assertViewIs('editor.pagina-projeto');
        $response->assertViewHas('projeto');
    }

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

    public function test_deve_buscar_projetos_por_query_parameter()
    {
        $this->withoutExceptionHandling();

        //Arrange
        $user = User::factory()->create();
        $this->actingAs($user);

        $projeto = $user->projetos()->save(Projeto::factory()->make());

        //Act
        $response = $this->get("/projetos/pesquisar?q=" . $projeto->nome);

        //Assert
        $response->assertStatus(200);
        $response->assertViewIs('editor.comunidade');
        $response->assertViewHas('projetos');
    }

}

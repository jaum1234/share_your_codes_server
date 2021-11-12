<?php

namespace Tests\Feature\Http\Controllers\Projeto;

use Tests\TestCase;
use App\Models\User;
use App\Models\Projeto;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExibirProjetosControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_deve_renderizar_pagina_da_comunidade()
    {
        $this->withoutExceptionHandling();

        //Arrange & Act
        $response = $this->get(route('projetos.index'));

        //Assert
        $response->assertOk();
        $response->assertViewIs('pages.comunidade');
        $response->assertViewHas('projetos');
    }

    public function test_deve_renderizar_pagina_do_projeto()
    {
        $this->withoutExceptionHandling();

        //Arrange
        $user = User::factory()->create();
        $projeto = $user->projetos()->save(Projeto::factory()->make());

        //Act
        $response = $this->get(
            route('projetos.show', [
                'id' => $projeto->id, 
                'nome' => $projeto->nome
                ]
            )
        );

        //Assert
        $response->assertOk(200);
        $response->assertViewIs('pages.pagina-projeto');
        $response->assertViewHas('projeto');
    }

    public function test_deve_buscar_projetos_por_query_parameter()
    {
        $this->withoutExceptionHandling();

        //Arrange
        $user = User::factory()->create();
        $this->actingAs($user);

        $projeto = $user->projetos()->save(Projeto::factory()->make());

        //Act
        $response = $this->get(
            route('pesquisar', [
                'q' => $projeto->nome
                ]
            )
        );

        //Assert
        $response->assertOk();
        $response->assertSee($projeto->codigo);
        $response->assertSee($projeto->nome);
        $response->assertSee($projeto->descricao);
        $response->assertViewIs('pages.comunidade');
        $response->assertViewHas('projetos');
    }
}

<?php

namespace Tests\Feature\Http\Controllers\Projeto;

use Tests\TestCase;
use App\Models\User;
use App\Models\Projeto;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CriarProjetosControllerTest extends TestCase
{
  

    use RefreshDatabase;

    public function test_deve_renderizar_pagina_criacao_projeto() 
    {
        $this->withoutExceptionHandling();

        //Arrange
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);

        //Act
        $response = $this->get(route('projetos.create'));

        //Assert
        $response->assertStatus(200);
        $response->assertViewIs('projetos.create');
    }

    public function test_deve_criar_um_projeto()
    {
        $this->withoutExceptionHandling();

        //Arrange
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'codigo' => 'codigo',
            'nome' => 'nome',
            'descricao' => 'descricao',
            'cor' => 'black'
        ];

        //Act
        $response = $this->post(route('projetos.store'), $data);

        $projeto = Projeto::first();

        //Assert
        $response->assertStatus(201);
        $response->assertJson([
            'success' => true,
            'message' => 'Projeto criado com sucesso!'
        ]);

        $this->assertEquals('nome', $projeto->nome);
        $this->assertEquals('descricao', $projeto->descricao);
        $this->assertEquals('codigo', $projeto->codigo);
        $this->assertEquals('black', $projeto->cor);
        $this->assertEquals($user->id, $projeto->user->id);
        $this->assertDatabaseHas('projetos', [
            'nome' => $projeto->nome,
            'descricao' => $projeto->descricao,
            'codigo' => $projeto->codigo,
            'cor' => $projeto->cor,
            'user_id' => $user->id
        ]);
    }

    /**
     * @dataProvider dadosParaValidacao
     */
    public function test_deve_falhar_ao_nao_preencher_os_campo_corretamente(array $camposPreechidos)
    {
        $this->withoutExceptionHandling();

        //Arrange
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = $camposPreechidos;

        //Act
        $response = $this->post(route('projetos.store'), $data);

        //Assert
        $response->assertJson([
            'success' => false,
        ]);
        
        $this->assertDatabaseMissing('projetos', $data);
    }

    public function dadosParaValidacao()
    {
        return [
            'campo código vazio' => [
                [
                    'codigo' => '',
                    'nome' => 'nome',
                    'descricao' => 'descricao',
                    'cor' => 'black'
                ]
            ],
            'campo descricao vazio' => [
                [
                    'codigo' => 'codigo',
                    'nome' => 'nome',
                    'descricao' => '',
                    'cor' => 'black'
                ]
            ],
            'campo nome vazio' => [
                [
                    'codigo' => 'codigo',
                    'nome' => '',
                    'descricao' => 'descricao',
                    'cor' => 'black'
                ]
            ],
            'campo cor vazio' => [
                [
                    'codigo' => 'codigo',
                    'nome' => 'nome',
                    'descricao' => 'descricao',
                    'cor' => ''
                ]
            ]
        ];
    }
}

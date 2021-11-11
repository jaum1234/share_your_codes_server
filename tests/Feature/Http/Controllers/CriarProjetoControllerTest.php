<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\User;
use App\Models\Projeto;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CriarProjetoControllerTest extends TestCase
{
    use RefreshDatabase;

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
        $response = $this->post(route('projetos.salvar'), $data);

        $projeto = Projeto::first();

        //Assert
        $response->assertStatus(201);

        $this->assertEquals('nome', $projeto->nome);
        $this->assertEquals('descricao', $projeto->descricao);
        $this->assertEquals('codigo', $projeto->codigo);
        $this->assertEquals('black', $projeto->cor);
        $this->assertEquals($user->id, $projeto->user->id);
        $this->assertDatabaseHas('projetos', [
            'nome' => $projeto->nome,
            'descricao' => $projeto->descricao,
            'codigo' => $projeto->codigo,
            'cor' => $projeto->cor
        ]);
    }
}

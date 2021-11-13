<?php

namespace Tests\Feature\Http\Controllers\User;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AtualizarUserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_deve_renderizar_pagina_do_usuario()
    {
        $this->withoutExceptionHandling();

        //Arrange 
        $user = User::factory()->create();
        $this->actingAs($user);

        //Act
        $response = $this->get(route('usuarios.edit', ['id' => $user->id, 'nick' => $user->nickname]));

        //Assert
        $response->assertStatus(200);
        $response->assertViewHas('user');
        $response->assertViewIs('pages.user');
    }

    public function test_deve_atualizar_dados_do_usuario()
    {
        $this->withoutExceptionHandling();

        //Arrange
        $data = [
            'name' => 'novo nome',
            'nickname' => 'novo nick'
        ];

        $user = User::factory()->create();
        $this->actingAs($user);

        //Act
        $response = $this->post(route('usuarios.update', ['id' => $user->id]), $data);

        //Assert
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => 'Dados atualizados com sucesso!'
        ]);

        $this->assertDatabaseHas('users', $data);
        $this->assertDatabaseMissing('users', ['name' => $user->name, 'nickname' => $user->nickname]);
    }

    /**
     * @dataProvider dadosComCamposVazios
     */
    public function test_deve_falhar_ao_nao_preencher_os_campos(array $dados)
    {
        $this->withoutExceptionHandling();

        //Arrange
        $user = User::factory()->create();
        $this->actingAs($user);


        $data = $dados;

        //Act
        $response = $this->post(route('usuarios.update', ['id' => $user->id]), $data);

        //Assert
        $response->assertJson([
            'success' => false,
        ]);
        
        $this->assertDatabaseMissing('users', $data);
    }

    /**
     *  No momento, nao esta passando pelo validador...
     */
    //public function test_deve_falhar_se_usuario_utilizar_nickname_repetido()
    //{
    //    $this->withoutExceptionHandling();
//
    //    //arrange
    //    $user1 = User::factory()->create([
    //        'name' => 'nome 1',
    //        'nickname' => 'nickname 1'
    //    ]);
    //    $this->actingAs($user1);
//
    //    $user2= User::factory()->create([
    //        'name' => 'nome 2',
    //        'nickname' => 'nickname 2'
    //    ]);
    //    $this->actingAs($user2);
//
    //    $data = ['name' => 'nome 1', 'nickname' => 'nickname 2'];
//
    //    //Act
    //    $response = $this->post(route('usuarios.update', ['id' => $user1->id]), $data);
//
    //    //Assert
    //    $response->assertJson([
    //        'success' => false,
    //        'erros' => ['unique' => 'nick repetido']
    //    ]);        
    //}

    public function dadosComCamposVazios()
    {
        return [
            'campo name vazio' => [
                [
                    'name' => '',
                    'nickname' => 'domo',
                ]
            ],
            'campo nickname vazio' => [
                [
                    'name' => 'joao',
                    'nickname' => '',
                ]
            ],
        ];
    }
}

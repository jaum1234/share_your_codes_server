<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_deve_renderizar_pagina_do_usuario()
    {
        $this->withoutExceptionHandling();

        //Arrange 
        $user = User::factory()->create();
        $this->actingAs($user);

        //Act
        $response = $this->get('/usuarios/' . $user->id . "/" . $user->nickname);

        //Assert
        $response->assertStatus(200);
        $response->assertViewIs('user.user');
    }

    public function test_deve_renderizar_pagina_meus_projetos()
    {
        $this->withoutExceptionHandling();

        //Arrange 
        $user = User::factory()->create();
        $this->actingAs($user);

        //Act
        $response = $this->get('/usuarios/' . $user->id . "/" . $user->nickname . "/projetos");

        //Assert
        $response->assertStatus(200);
        $response->assertViewIs('user.meus-projetos');
        $response->assertViewHas('projetos');
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
        $response = $this->post('/usuarios/' . $user->id . '/editar', $data);

        //Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('users', $data);
        $this->assertDatabaseMissing('users', ['name' => $user->name, 'nickname' => $user->nickname]);
    }
}//
//
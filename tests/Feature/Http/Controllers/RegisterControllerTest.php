<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_deve_renderizar_pagina_de_registro()
    {
        $this->withoutExceptionHandling();

        //Arrange & Act
        $response = $this->get('/cadastro');

        //Assert
        $response->assertStatus(200);
        $response->assertViewIs('autenticacao.cadastro');
        $response->assertViewHas('titulo'); 
    }

    public function test_deve_registrar_um_usuario()
    {
        $this->withoutExceptionHandling();

        //Arrange
        $data  = [ 
            'name' => 'Test User',
            'email' => 'test@domain.com',
            'nickname' => 'Fake nickname',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        //Act
        $response = $this->post(route('cadastro'), $data);
        
        $user = User::first();
        
        //Assert
        $response->assertStatus(302);
        $response->assertRedirect(route('form.login'));

        $this->assertEquals(1, User::count());
        $this->assertEquals('Test User', $user->name);
        $this->assertEquals('test@domain.com', $user->email);
        $this->assertEquals('Fake nickname', $user->nickname);
        $this->assertTrue(Hash::check($data['password'], $user->password));
        
        unset($data['password']);
        unset($data['password_confirmation']);
        
        $this->assertDatabaseHas('users', $data);
    }

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
        $response->assertViewIs('editor.meus-projetos');
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
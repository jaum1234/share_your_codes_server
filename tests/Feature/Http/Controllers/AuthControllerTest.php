<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_deve_renderizar_pagina_de_login()
    {
        //Act
        $response = $this->get(route('form.login'));

        //Assert
        $response->assertStatus(200);
        $response->assertViewIs('autenticacao.login');
        $response->assertViewHas('titulo', 'Login');
        $response->assertSessionMissing('mensagem');
    }

    public function test_deve_logar_usuario()
    {
        $this->withoutExceptionHandling();

        //Arrange
        $user = User::factory()->create();

        $data = [
            'email' => $user->email,
            'password' => 'password'
        ];

        //Act
        $response = $this->post(route('login'), $data);

        //Assert
        $response->assertStatus(302);
        $response->assertRedirect('/projetos/criar');

        $this->assertAuthenticated();
    }

    public function test_deve_retornar_erro_se_senha_invalida()
    {
        $this->withoutExceptionHandling();

        //Arrange
        $user = User::factory()->create();

        $data = [
            'email' => $user->email,
            'password' => 'senha errada, bem errada'
        ];

        //Act
        $response = $this->post(route('login'), $data);

        //Assert
        $response->assertStatus(302);
        $response->assertSessionHasErrors('erro');

        $this->assertGuest();
    }

   
}

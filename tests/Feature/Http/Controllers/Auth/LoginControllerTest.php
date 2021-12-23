<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Tests\TestCase;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;


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
        $response = $this->post(route('login.store'), $data);
        $content = $response->decodeResponseJson();
        

        //Assert
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'data' => [
                'user' => [
                    'name',
                    'nickname',
                ],
                'token' => [
                    'access_token',
                    'token_type',
                    'expires_in'
                ]
            ],
            'message'
        ]);
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
        $response = $this->post(route('login.store'), $data);

        //Assert
        $response->assertStatus(400);
        $response->assertJsonStructure([
            'success',
            'data' => [],
            'message'
        ]);

        $this->assertGuest();
    }
}

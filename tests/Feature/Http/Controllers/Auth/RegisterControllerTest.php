<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;

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
        $response = $this->post(route('register.store'), $data);
        
        $user = User::first();
        
        //Assert
        $response->assertStatus(201);

        $this->assertEquals(1, User::count());
        $this->assertEquals('Test User', $user->name);
        $this->assertEquals('test@domain.com', $user->email);
        $this->assertEquals('Fake nickname', $user->nickname);
        $this->assertTrue(Hash::check($data['password'], $user->password));
        
        unset($data['password']);
        unset($data['password_confirmation']);
        
        $this->assertDatabaseHas('users', $data);
    }   

    /**
     * @dataProvider dadosParaValidacao
     */
    public function test_deve_falhar_ao_nao_preencher_os_campo_corretamente(array $camposPreechidos)
    {
        $this->withoutExceptionHandling();

        //Arrange
        $data = $camposPreechidos;

        //Act
        $response = $this->post(route('register.store'), $data);

        //Assert 
        $response->assertJsonStructure([
            'success',
            'data' => ['erros'],
            'message'
        ]);
        $this->assertDatabaseMissing('users', $data);
    }

    public function dadosParaValidacao()
    {
        return [
            'campo name vazio' => [
                [
                    'name' => '',
                    'nickname' => 'fake nickname',
                    'email' => 'test@domain',
                    'password' => 'password',
                ]
            ],
            'campo email vazio' => [
                [
                    'name' => 'test user',
                    'nickname' => 'fake nickname',
                    'email' => '',
                    'password' => 'password',
                ]
            ],
            'campo password vazio' => [
                [
                    'name' => 'test user',
                    'nickname' => 'fake nickname',
                    'email' => 'test@domain',
                    'password' => '',
                ]
            ],
            'campo nickname vazio' => [
                [
                    'name' => 'test user',
                    'nickname' => '',
                    'email' => 'test@domain',
                    'password' => 'password',
                ]
            ],
        ];
    }
}
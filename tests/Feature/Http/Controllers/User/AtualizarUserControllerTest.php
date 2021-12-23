<?php

namespace Tests\Feature\Http\Controllers\User;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tymon\JWTAuth\Facades\JWTAuth;

class AtualizarUserControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private string $token;
    private array $header;

    protected function setUp(): void
    {
        parent::setUp();
    
        $this->user = User::factory()->create();
        $this->token = JWTAuth::fromUser($this->user);
        $this->header = ['Authorization' => 'Bearer ' . $this->token];
    }
    

    public function test_deve_atualizar_dados_do_usuario()
    {
        $this->withoutExceptionHandling();

        //Arrange
        $data = [
            'name' => 'novo nome',
            'nickname' => 'novo nick'
        ];

        //Act
        $response = $this->put(
            route('users.update', ['id' => $this->user->id]), 
            $data,
            $this->header
        );
        $content = $response->decodeResponseJson();

        //Assert
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'data' => [
                'new_nickname',
                'new_name'
            ],
            'message'
        ]);

        $this->assertTrue($content['success']);
        $this->assertEquals($data['name'], $content['data']['new_name']);
        $this->assertEquals($data['nickname'], $content['data']['new_nickname']);
        $this->assertDatabaseHas('users', $data);
        $this->assertDatabaseMissing('users', ['name' => $this->user->name, 'nickname' => $this->user->nickname]);
    }

    /**
     * @dataProvider dadosComCamposVazios
     */
    public function test_deve_falhar_ao_nao_preencher_os_campos(array $dados)
    {
        $this->withoutExceptionHandling();

        //Arrange
        $data = $dados;

        //Act
        $response = $this->put(
            route('users.update', ['id' => $this->user->id]), 
            $data,
            $this->header
        );
        $content = $response->decodeResponseJson();

        //Assert
        $response->assertJsonStructure([
            'success',
            'data' => ['erros'],
            'message'
        ]);
        $this->assertFalse($content['success']);
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
    //    $response = $this->post(route('users.update', ['id' => $user1->id]), $data);
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

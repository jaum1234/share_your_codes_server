<?php

namespace Tests\Feature\Http\Controllers\User;

use App\Models\Projeto;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tymon\JWTAuth\Facades\JWTAuth;

class ProjetosUserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_deve_listar_projetos_do_usuario_autenticado()
    {
        $this->withoutExceptionHandling();

        //Arrange 
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        $projeto1 = $user1->projetos()->save(Projeto::factory()->make());
        $projeto2 = $user2->projetos()->save(Projeto::factory()->make());

        $token = JWTAuth::fromUser($user1);

        //Act
        $response = $this->get(
            route('users.projetos',['id' => $user1->id]),
            ['Authorization' => 'Bearer ' . $token]
        );
        $content = $response->decodeResponseJson();

        //Assert
        $response->assertOk();
        $response->assertJsonStructure([
            'success',
            'data' => [
                'total', 
                'projetos' => [
                    '*' => [
                        'nome',
                        'descricao',
                        'cor',
                        'codigo',
                        'user' => [
                            'nickname',
                            'id'
                        ]
                    ]
                ]
            ],
            'message'
        ]);
        $response->assertSee($projeto1->nome);
        $response->assertSee($projeto1->descricao);
        $response->assertSee($projeto1->codigo);
        $response->assertSee($projeto1->codigo);

        $this->assertEquals(1, $projeto1->user->id);
        $this->assertEquals(1, $content['data']['projetos'][0]['user']['id']);
    }
}

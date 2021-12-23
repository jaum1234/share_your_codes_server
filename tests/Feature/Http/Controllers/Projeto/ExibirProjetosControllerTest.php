<?php

namespace Tests\Feature\Http\Controllers\Projeto;

use Tests\TestCase;
use App\Models\User;
use App\Models\Projeto;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExibirProjetosControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_deve_listar_todos_os_projetos()
    {
        $this->withoutExceptionHandling();

        //Arrange & Act
        $response = $this->get(route('projetos.index'));

        //Assert
        $response->assertOk();
        $response->assertJsonStructure([
            'success',
            'data' => [
                'total', 
                'projetos' => [ '*' =>
                    [
                        'nome',
                        'descricao',
                        'codigo',
                        'cor',
                        'user' => [
                            'id',
                            'nickname'
                        ]
                    ]
                ]
            ],
            'message'
        ]);
    }

    public function test_deve_exibir_um_unico_projeto()
    {
        $this->withoutExceptionHandling();

        //Arrange
        $user = User::factory()->create();
        $projeto = $user->projetos()->save(Projeto::factory()->make());

        //Act
        $response = $this->get(
            route('projetos.show', [
                'id' => $projeto->id, 
                ]
            )
        );

        //Assert
        $response->assertOk();
        $response->assertJsonStructure([
            'success',
            'data' => [
                'projeto' => [ '*' =>
                    [
                        'nome',
                        'descricao',
                        'codigo',
                        'cor',
                        'user' => [
                            'id',
                            'nickname'
                        ]
                    ]
                ]
            ],
            'message'
        ]);
        $response->assertSee($projeto->codigo);
        $response->assertSee($projeto->nome);
        $response->assertSee($projeto->descricao);
        $response->assertSee($projeto->cor);
        $response->assertSee($projeto->user->id);
        $response->assertSee($projeto->user->nickname);
        $response->assertSee('');
        
    }

    public function test_deve_buscar_projetos_por_query_parameter()
    {
        $this->withoutExceptionHandling();

        //Arrange
        $user = User::factory()->create();

        for ($i = 0; $i < 4; $i++) {
            $user->projetos()->save(Projeto::factory()->make());
        }

        $projeto = Projeto::find(2);

        //Act
        $response = $this->get(
            route('pesquisar', [
                'q' => $projeto->nome
                ]
            )
        );

        //Assert
        $response->assertOk();
        $response->assertJsonStructure([
            'success',
            'data' => [
                'total', 
                'projetos' => [ '*' =>
                    [
                        'nome',
                        'descricao',
                        'codigo',
                        'cor',
                        'user' => [
                            'id',
                            'nickname'
                        ]
                    ]
                ]
            ],
            'message'
        ]);
        $response->assertSee($projeto->codigo);
        $response->assertSee($projeto->nome);
        $response->assertSee($projeto->descricao);
        $response->assertSee($projeto->cor);
        $response->assertSee($projeto->user->id);
        $response->assertSee($projeto->user->nickname);
        $response->assertSee('');
       
    }
}

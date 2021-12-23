<?php

namespace Tests\Feature\Http\Controllers\Projeto;

use Tests\TestCase;
use App\Models\User;
use App\Models\Projeto;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CriarProjetosControllerTest extends TestCase
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
        $this->header = [
            'Authorization' => 'Bearer ' . $this->token
        ];
    }
    

    public function test_deve_criar_um_projeto()
    {
        $this->withoutExceptionHandling();

        $data = [
            'codigo' => 'codigo do projeto',
            'nome' => 'nome do projeto',
            'descricao' => 'descricao do projeto',
            'cor' => 'black'
        ];

        //Act
        $response = $this->post(
            route('projetos.store'), 
            $data, 
            $this->header
        );

        $projeto = Projeto::first();

        //Assert
        $response->assertStatus(201);
        $response->assertJsonStructure([
            'success',
            'data',
            'message'
        ]);

        $this->assertEquals('nome do projeto', $projeto->nome);
        $this->assertEquals('descricao do projeto', $projeto->descricao);
        $this->assertEquals('codigo do projeto', $projeto->codigo);
        $this->assertEquals('black', $projeto->cor);
        $this->assertEquals($this->user->id, $projeto->user->id);
        $this->assertDatabaseHas('projetos', [
            'nome' => $projeto->nome,
            'descricao' => $projeto->descricao,
            'codigo' => $projeto->codigo,
            'cor' => $projeto->cor,
            'user_id' => $this->user->id
        ]);
    }

    /**
     * @dataProvider dadosParaValidacao
     */
    public function test_deve_falhar_ao_nao_preencher_os_campo_corretamente(array $camposPreechidos)
    {
        $this->withoutExceptionHandling();

        $data = $camposPreechidos;

        //Act
        $response = $this->post(route('projetos.store'), $data, $this->header);

        //Assert
        $response->assertStatus(400);
        $response->assertJsonStructure([
            'success',
            'data',
            'message'
        ]);
        
        $this->assertDatabaseMissing('projetos', $data);
    }

    public function dadosParaValidacao()
    {
        return [
            'campo código vazio' => [
                [
                    'codigo' => '',
                    'nome' => 'nome',
                    'descricao' => 'descricao',
                    'cor' => 'black'
                ]
            ],
            'campo descricao vazio' => [
                [
                    'codigo' => 'codigo',
                    'nome' => 'nome',
                    'descricao' => '',
                    'cor' => 'black'
                ]
            ],
            'campo nome vazio' => [
                [
                    'codigo' => 'codigo',
                    'nome' => '',
                    'descricao' => 'descricao',
                    'cor' => 'black'
                ]
            ],
            'campo cor vazio' => [
                [
                    'codigo' => 'codigo',
                    'nome' => 'nome',
                    'descricao' => 'descricao',
                    'cor' => ''
                ]
            ]
        ];
    }
}

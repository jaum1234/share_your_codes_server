<?php

namespace App\Http\Controllers\Projetos;

use App\Models\Projeto;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Service\ResponseOutput\ResponseOutput;
use App\Service\Validadores\ProjetosValidador;

class AtualizarProjetosController extends Controller
{
    private ProjetosValidador $validador;

    public function __construct(ProjetosValidador $projetosValidador)
    {
        $this->validador = $projetosValidador;
    }

    public function update(Request $request, int $id): JsonResponse
    {

        $validador = $this->validador->validar($request);

        if (!$validador['success']) {
            return (new ResponseOutput(
                false,
                $validador,
                410
            ))->jsonOutput();
        }

        $dadosValidados = $validador['dados'];

        $projeto = Projeto::find($id);

        $projeto->nome = $dadosValidados['nome'];
        $projeto->descricao = $dadosValidados['descricao'];
        $projeto->codigo = $dadosValidados['codigo'];
        $projeto->cor = $dadosValidados['cor'];

        $projeto->save();

        return (new ResponseOutput(
            true,
            [
                'projeto' => $projeto
            ],
            200
        ))->jsonOutput();
    }
}

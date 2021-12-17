<?php

namespace App\Http\Controllers\Projetos;

use App\Http\Controllers\BaseController;
use App\Models\Projeto;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Service\Validadores\ProjetosValidador;

class AtualizarProjetosController extends BaseController
{
    private ProjetosValidador $validador;

    public function __construct(ProjetosValidador $projetosValidador)
    {
        parent::__construct();
        $this->validador = $projetosValidador;
    }

    public function update(Request $request, int $id): JsonResponse
    {

        $validador = $this->validador->validar($request);

        if (!$validador['success']) {
            return $this->responseOutput->validationErrors($validador);
        }

        $dadosValidados = $validador['dados'];

        $projeto = Projeto::find($id);

        $projeto->nome = $dadosValidados['nome'];
        $projeto->descricao = $dadosValidados['descricao'];
        $projeto->codigo = $dadosValidados['codigo'];
        $projeto->cor = $dadosValidados['cor'];

        $projeto->save();

        return $this->responseOutput->set(
            true,
            ['projeto' => $projeto],
            "Projeto atualizado.",
        );
    }
}

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
    }

    public function update(Request $request, int $id): JsonResponse
    {

        $validador = ProjetosValidador::validar($request);

        if ($validador->fails()) {
            return $this->responseOutput->validationErrors($validador->errors());
        }

        $dadosValidados = $validador->validated();

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

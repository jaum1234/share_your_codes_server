<?php

namespace App\Http\Controllers\Projetos;

use App\Http\Controllers\BaseController;
use App\Models\Projeto;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Service\Validadores\ProjetosValidador;
use Illuminate\Validation\ValidationException;

class AtualizarProjetosController extends BaseController
{
    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $validador = ProjetosValidador::validar($request);
        } catch (ValidationException $e) {
            return $this->responseOutput->validationErrors($e->errors());
        }

        $dadosValidados = $validador;

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

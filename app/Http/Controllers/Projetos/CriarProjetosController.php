<?php

namespace App\Http\Controllers\Projetos;

use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Service\Validadores\ProjetosValidador;
use Illuminate\Http\JsonResponse;

class CriarProjetosController extends BaseController
{
    public function __construct(ProjetosValidador $projetosValidador)
    {
        parent::__construct();
    }

    public function store(Request $request): JsonResponse
    {   
        
        $validador = ProjetosValidador::validar($request);

        if ($validador->fails()) {
            return $this->responseOutput->validationErrors($validador->errors());
        }
        
        $dadosValidados = $validador->validated();

        $user = User::find(Auth::user()->id);
        
        $projeto = $user->projetos()->create($dadosValidados);
        
        return $this->responseOutput->set(
            true,
            ['projeto' => $projeto],
            "Projeto criado.",
            201
        );
    }
}

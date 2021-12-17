<?php

namespace App\Http\Controllers\Projetos;

use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Projeto;
use App\Service\ResponseOutput\ResponseOutput;
use Illuminate\Support\Facades\Auth;
use App\Service\Validadores\ProjetosValidador;
use Illuminate\Http\JsonResponse;

class CriarProjetosController extends BaseController
{
    private ProjetosValidador $validador;

    public function __construct(ProjetosValidador $projetosValidador)
    {
        parent::__construct();
        $this->validador = $projetosValidador;
    }

    public function store(Request $request): JsonResponse
    {   
        
        $validador = $this->validador->validar($request);

        if (!$validador['success']) {
            return $this->responseOutput->validationErrors($validador);
        }
        
        $dadosValidados = $validador['dados'];

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

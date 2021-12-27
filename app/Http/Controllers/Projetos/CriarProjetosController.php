<?php

namespace App\Http\Controllers\Projetos;

use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Service\Validadores\ProjetosValidador;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

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
        try {
            $validador = $this->validador->validar($request);
        } catch (ValidationException $e) {
            return $this->responseOutput->validationErrors($e->errors());
        }
        
        $dadosValidados = $validador;
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

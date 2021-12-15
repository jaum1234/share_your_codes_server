<?php

namespace App\Http\Controllers\Projetos;

use App\Http\Controllers\Controller;
use App\Service\ResponseOutput\ResponseOutput;
use App\Service\Validadores\ProjetosValidador;
use Illuminate\Http\Request;

class AtualizarProjetosController extends Controller
{
    private ProjetosValidador $validador;

    public function __construct(ProjetosValidador $projetosValidador)
    {
        $this->validador = $projetosValidador;
    }

    public function atualizar(Request $request)
    {
        $validador = $this->validador->validar($request);

        if (!$validador['success']) {
            return (new ResponseOutput(
                false,
                $validador,
                410
            ))->jsonOutput();
        }

        
    }
}

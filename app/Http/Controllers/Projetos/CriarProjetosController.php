<?php

namespace App\Http\Controllers\Projetos;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Projeto;
use Illuminate\Support\Facades\Auth;
use App\Service\Validadores\ProjetosValidador;

class CriarProjetosController extends Controller
{
    private $validador;

    public function __construct(ProjetosValidador $projetosValidador)
    {
        $this->validador = $projetosValidador;
    }

    public function store(Request $request)
    {   
        
        $validador = $this->validador->validar($request);

        if (!$validador['success']) {
            return response()->json($validador);
        }
        
        $dadosValidados = $validador['dados'];

        $user = User::find(Auth::user()->id);
        
        $projeto = $user->projetos()->create($dadosValidados);
        
        return response()->json([
            'success' => true,
            'projeto' => $projeto,
            'msg' => 'Projeto criado com sucesso!'
        ], 201); 
    }
}

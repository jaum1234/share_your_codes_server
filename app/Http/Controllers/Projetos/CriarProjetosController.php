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

        
        $projeto = Projeto::create([
            'nome' => $request->nome,
            'codigo' => $request->codigo,
            'descricao' => $request->descricao,
            'cor' => $request->cor,
            'user_id' => 1
        ]);
        
        return response()->json([
            'success' => true,
            'projeto' => $projeto,
            'msg' => 'Projeto criado com sucesso!'
        ], 201); 
    }
}

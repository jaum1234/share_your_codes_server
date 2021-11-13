<?php

namespace App\Http\Controllers\Projetos;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Service\Validadores\ProjetosValidador;

class CriarProjetosController extends Controller
{
    private $validador;

    public function __construct(ProjetosValidador $projetosValidador)
    {
        $this->validador = $projetosValidador;
    }

    public function create()
    {
        return response()->view('projetos.create');
    }

    public function store(Request $request)
    {   
        
        $validador = $this->validador->validar($request);

        if (!$validador['success']) {
            return response()->json($validador);
        }
        
        $dadosValidados = $validador['dados'];

        $user = User::find(Auth::id());
        $user->projetos()->create($dadosValidados);
          
        $response['success'] = true;
        $response['message'] = 'Projeto criado com sucesso!';
        
        return response()->json($response, 201); 
    }
}

<?php

namespace App\Http\Controllers\Projetos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CriarProjetosController extends Controller
{
    public function create()
    {
        return response()->view('pages.editor');
    }

    public function store(Request $request)
    {   
        $validador = $this->projetoService->validar($request);

        if ($validador->fails()) {
            $response['success'] = false;
            $response['message'] = $validador->errors();
            return response()->json($response);
        }
        
        $dadosValidados = $validador->validated();

        $this->projetoService->criar($dadosValidados);
          
        $response['success'] = true;
        $response['message'] = 'Projeto criado com sucesso!';
        
        return response()->json($response, 201); 
    }
}

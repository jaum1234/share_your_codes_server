<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Models\Projeto;
use App\Service\validador;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Validadores\UserValidador;
use Illuminate\Support\Facades\Auth;

class AtualizarUserController extends Controller
{
    private $validador;

    public function __construct(UserValidador $userValidador)
    {
        $this->validador = $userValidador;
    }
    
    public function edit(Request $request) 
    {
        $user = Auth::user();

        return response()->view('pages.user', compact('user'), 200);
    }
    
    public function update(Request $request, Int $id)
    { 
        $validator = $this->validador->validar($request);

        if (!$validator['success']) {
            return response()->json($validator);
        }

        $dadosValidados = $validator['dados'];

        $usuario = User::find($id);
        $usuario->name = $dadosValidados['name'];
        $usuario->nickname = $dadosValidados['nickname'];
        $usuario->save();

        $response['success'] = true;
        $response['message'] = 'Dados atualizados com sucesso!';
        
        return response()->json($response, 200);   
    }

    

}

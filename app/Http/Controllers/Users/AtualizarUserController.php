<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\ResponseOutput\ResponseOutput;
use App\Service\Validadores\UserValidador;


class AtualizarUserController extends Controller
{
    private $validador;

    public function __construct(UserValidador $userValidador)
    {
        $this->validador = $userValidador;
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
        
        return (new ResponseOutput(
            true,
            ['new_nickname' => $usuario->nickname, 'new_name' => $usuario->name],
            200,
        ))->jsonOutput();   
    }

    

}

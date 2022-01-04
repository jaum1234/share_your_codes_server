<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\ResponseOutput\ResponseOutput;
use App\Service\Validadores\UserValidador;
use ControllerValidavel;
use Illuminate\Validation\ValidationException;

class AtualizarUserController extends BaseController
{
    private UserValidador $validador;

    public function __construct(UserValidador $userValidador)
    {
        parent::__construct();
        $this->validador = $userValidador;
    }
    
    public function update(Request $request, Int $id)
    { 
        try {
            $validator = $this->validador->validar($request);
        } catch (ValidationException $e) {
            return $this->responseOutput->validationErrors($e->errors());
        }

        $dadosValidados = $validator;

        $usuario = User::find($id);
        $usuario->name = $dadosValidados['name'];
        $usuario->nickname = $dadosValidados['nickname'];
        $usuario->save();
        
        return $this->responseOutput->set(
            true,
            ["new_nickname" => $usuario->nickname, "new_name" => $usuario->name],
            "Dados do usuário atualizados."
        );   
    }

    

}

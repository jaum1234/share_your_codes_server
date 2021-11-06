<?php 
namespace App\Service\Validadores;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterValidador extends BaseValidador
{

    public function validar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nickname' => 'required|unique:users,nickname',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|string'
        ], [
            'required' => 'Esse campo é obrigatório.',
            'email' => 'E-mail inválido.',
            'unique' => ':attribute já cadastrado.',
            'confirmed' => 'As senhas nao correspondem.'
        ]);

        return $this->resultato($validator);
    }
}
<?php 
namespace App\Service\Validadores;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginValidador extends BaseValidador
{
    public function validar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'email' => 'required|email|exists:users,email',
        ], [
            'required' => 'Esse campo é obrigatório.',
            'email' => 'E-mail inválido.',
            'exists' => 'E-mail nao cadastrado.'
        ]);

        return $this->resultado($validator);
    }
}
<?php 
namespace App\Service\Validadores;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginValidador extends BaseValidador
{
    public function validar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required||string|exists:user,password',
            'email' => 'required|email|exists:users,email',
        ], [
            'required' => 'Esse campo é obrigatório.',
            'email' => 'E-mail inválido.',
            'exists' => ':attribute incorreto',
            'current_password' => 'Senha incorreta.'
        ]);

        return $this->resultado($validator);
    }
}
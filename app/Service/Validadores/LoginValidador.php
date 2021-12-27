<?php 
namespace App\Service\Validadores;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Service\Validadores\BaseValidador;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;

class LoginValidador extends BaseValidador
{
    protected function rules(): array
    {
        return [
            'password' => 'required||string',
            'email' => 'required|email|exists:users,email',
        ];
    }

    protected function messages(): array
    {
        return [
            'required' => 'Esse campo é obrigatório.',
            'email' => 'E-mail inválido.',
            'exists' => ':attribute incorreto',
            'current_password' => 'Senha incorreta.'
        ];
    }
}
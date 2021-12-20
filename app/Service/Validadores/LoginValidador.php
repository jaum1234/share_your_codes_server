<?php 
namespace App\Service\Validadores;

use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginValidador
{
    public static function validar(Request $request): ValidationValidator
    {
        return Validator::make($request->all(), self::rules(), self::messages());
    }

    private static function rules(): array
    {
        return [
            'password' => 'required||string',
            'email' => 'required|email|exists:users,email',
        ];
    }

    private static function messages(): array
    {
        return [
            'required' => 'Esse campo é obrigatório.',
            'email' => 'E-mail inválido.',
            'exists' => ':attribute incorreto',
            'current_password' => 'Senha incorreta.'
        ];
    }
}
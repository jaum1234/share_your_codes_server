<?php 
namespace App\Service\Validadores;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Service\Validadores\BaseValidador;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;

class LoginValidador extends BaseValidador
{
    public static function validar(Request $request): array
    {
        $validador = Validator::make($request->all(), self::rules(), self::messages());
        return self::resultado($validador);
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
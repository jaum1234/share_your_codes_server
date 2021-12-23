<?php 
namespace App\Service\Validadores;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Service\Validadores\BaseValidador;

class RegisterValidador extends BaseValidador
{

    public static function validar(Request $request): array
    {
        $validador = Validator::make($request->all(), self::rules(), self::messages());
        return self::resultado($validador);
    }

    private static function rules(): array
    {
        return [
            'nickname' => 'required|unique:users,nickname',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|string'
        ];
    }

    private static function messages(): array
    {
        return [
            'required' => 'Esse campo é obrigatório.',
            'email' => 'E-mail inválido.',
            'unique' => ':attribute já cadastrado.',
            'confirmed' => 'As senhas nao correspondem.'
        ];
    }
}
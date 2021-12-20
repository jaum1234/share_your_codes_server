<?php 
namespace App\Service\Validadores;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterValidador
{

    public static function validar(Request $request)
    {
        return Validator::make($request->all(), self::rules(), self::messages());
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
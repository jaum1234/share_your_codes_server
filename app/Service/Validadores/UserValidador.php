<?php 
namespace App\Service\Validadores;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserValidador extends BaseValidador
{
    public static function validar(Request $request): array
    {
        $validador = Validator::make($request->all(), self::rules(), self::messages());
        return self::resultado($validador);
    }

    private static function rules(): array
    {
        return [
            'nickname' => 'required|string|unique:users,nickname,' . Auth::user()->getAuthIdentifier(),
            'name' => 'required|string'
        ];
    }

    private static function messages(): array
    {
        return [
            'required' => 'Esse campo é obrigatório.',
            'unique' => 'Esse nickname já está em uso.'
        ];
    }
}
<?php 
namespace App\Service\Validadores;

use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjetosValidador
{
    public static function validar(Request $request): ValidationValidator
    {
        return Validator::make($request->all(), self::rules(), self::messages());
    }

    private static function rules(): array
    {
        return [
            'nome' => 'required|string',
            'descricao' => 'required|string',
            'cor' => 'string',
            'codigo' => 'required|string'
        ];
    }

    private static function messages()
    {
        return [
            'required' => 'Campo :attribute deve ser obrigatório.',
            'string' => ':attribute deve ser uma string válida.'
        ];
    }
}
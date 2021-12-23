<?php 
namespace App\Service\Validadores;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Service\Validadores\BaseValidador;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;

class ProjetosValidador extends BaseValidador
{
    public static function validar(Request $request): array
    {
        $validador = Validator::make($request->all(), self::rules(), self::messages());
        return self::resultado($validador);
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
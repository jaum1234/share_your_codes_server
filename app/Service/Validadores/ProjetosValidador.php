<?php 
namespace App\Service\Validadores;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Service\Validadores\BaseValidador;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;

class ProjetosValidador extends BaseValidador
{
    protected function rules(): array
    {
        return [
            'nome' => 'required|string',
            'descricao' => 'required|string',
            'cor' => 'string',
            'codigo' => 'required|string'
        ];
    }

}
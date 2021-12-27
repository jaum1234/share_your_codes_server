<?php 
namespace App\Service\Validadores;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Service\Validadores\BaseValidador;

class RegisterValidador extends BaseValidador
{
    protected function rules(): array
    {
        return [
            'nickname' => 'required|unique:users,nickname',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|string'
        ];
    }

    protected function messages(): array
    {
        return [
            'required' => 'Esse campo é obrigatório.',
            'email' => 'E-mail inválido.',
            'unique' => ':attribute já cadastrado.',
            'confirmed' => 'As senhas nao correspondem.'
        ];
    }
}
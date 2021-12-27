<?php 
namespace App\Service\Validadores;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserValidador extends BaseValidador
{
    protected function rules(): array
    {
        return [
            'nickname' => 'required|string|unique:users,nickname,' . Auth::user()->getAuthIdentifier(),
            'name' => 'required|string'
        ];
    }

    protected function messages(): array
    {
        return [
            'required' => 'Esse campo é obrigatório.',
            'unique' => 'Esse nickname já está em uso.'
        ];
    }
}
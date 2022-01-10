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
            'password' => 'required|confirmed|string|min:3|max:50'
        ];
    }

}
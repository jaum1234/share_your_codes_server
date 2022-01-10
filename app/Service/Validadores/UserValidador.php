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

}
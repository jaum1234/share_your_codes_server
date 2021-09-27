<?php 
namespace App\Service;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class UserService
{
    public function validar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nickname' => 'required|unique:users,nickname,' . Auth::user()->getAuthIdentifier(),
            'name' => 'required|required'
        ], [
            'required' => 'Esse campo é obrigatório.',
            'unique' => 'Esse nickname já está em uso.'
        ]);

        return $validator;
    }
}
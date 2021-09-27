<?php 
namespace App\Service;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterService 
{
    public function registrar(array $dados)
    {
        $senhaHash = bcrypt($dados['password']);

        User::create([
            'name' => $dados['name'],
            'nickname' =>$dados['nickname'],
            'email' => $dados['email'],
            'password' => $senhaHash
        ]);;
    }

    public function validar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nickname' => 'required|unique:users,nickname',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ], [
            'required' => 'Esse campo é obrigatório.',
            'email' => 'E-mail inválido.',
            'unique' => ':attribute já cadastrado.',
            'confirmed' => 'As senhas nao correspondem.'
        ]);

        return $validator;
    }
}
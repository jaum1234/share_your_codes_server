<?php 
namespace App\Service;

use App\Models\User;

class RegisterService 
{
    public function registrar($request)
    {
        $senhaHash = bcrypt($request->password);

        User::create([
            'name' => $request->name,
            'nickname' =>$request->nickname,
            'email' => $request->email,
            'password' => $senhaHash
        ]);;
    }

    public function validar()
    {
        
    }
}
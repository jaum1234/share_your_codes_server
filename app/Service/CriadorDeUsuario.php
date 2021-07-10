<?php 

namespace App\Service;

use App\Models\User;

class CriadorDeUsuario
{
    public function criarUsuario(
        string $nome, 
        string $nickname, 
        string $email, 
        string $senha
        )
    {
        $user = User::create([
            'name' => $nome,
            'nickname' => $nickname,
            'email' => $email,
            'password' => $senha
        ]);

        return $user;
    }
}
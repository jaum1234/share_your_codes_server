<?php 

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class VerificadorSenha
{
    public function verificarSenha($email, $senha)
    {
        $user = User::where('email', $email)->first();
        $hash = Hash::check($senha, $user->password);
        if (!$hash) {
            return ;
        }

        return [$email, $senha];
    } 
}
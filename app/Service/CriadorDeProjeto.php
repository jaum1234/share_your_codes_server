<?php 

namespace App\Service;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CriadorDeProjeto 
{
    public function criarProjeto(
        string $nome,
        string $descricao,
        string $codigo,
        string $cor
        )
    {
        $user = User::find(Auth::id());

        $projeto = $user->projetos()->create([
            'nome' => $nome,
            'descricao' => $descricao,
            'codigo' => $codigo,
            'cor' => $cor,
        ]);

        return $projeto;
    }
}
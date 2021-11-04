<?php 
namespace App\Service;

use App\Models\User;
use App\Models\Projeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProjetoService
{
    public function criar(array $dados)
    {
        $user = User::find(Auth::id());
        $projeto = $user->projetos()->create($dados);

        return $projeto;
    }
}
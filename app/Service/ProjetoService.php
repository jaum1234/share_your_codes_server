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

    public function pesquisar(string $criterio)
    {
        $query = $criterio; 
        $projetos = Projeto::where('nome', 'LIKE', '%' . $query . '%')
            ->paginate(4);
        $projetos->appends(['q' => $query]);

        return $projetos;
    }

    public function validar(Request $request)
    {
        $validador = Validator::make($request->all(), [
            'nome' => 'required',
            'descricao' => 'required',
            'cor' => 'required',
            'codigo' => 'required'
        ], [
            'required' => 'Esse campo é obrigatório.'
        ]);

        return $validador;
    }
}
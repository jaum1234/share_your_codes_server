<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Projeto;
use App\Service\Paginador;
use Illuminate\Http\Request;
use App\Service\EditorPerfil;
use App\Repository\UserRepository;
use App\Service\BuscadorDeProjeto;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserFormResquest;
use App\Http\Requests\UsuarioFormRequest;
use App\Http\Requests\CadastroFormRequest;
use App\Http\Requests\UsuarioFormResquest;
use App\Http\Requests\ValidacaoNomeUsuarioRequest;

class RegisterController extends Controller
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function edit(Request $request) 
    {
        $user = Auth::user();
        $mensagem = $request->session()->get('mensagem');

        return response()->view('user.user', compact('user', 'mensagem'), 200);
    }
    
    public function update(UsuarioFormRequest $request, Int $id)
    { 
        $usuario = User::find($id);
        $usuario->name = $request->name;
        $usuario->nickname = $request->nickname;
        $usuario->save();

        $response['success'] = true;
        $response['message'] = 'Dados atualizados com sucesso!';
        
        return response()->json($response, 200);   
    }

    public function meusProjetos(Request $request)
    {
        $projetos = Projeto::where('user_id', Auth::id())
            ->orderBy('nome')
            ->paginate(4);

        return response()->view(
        'editor.meus-projetos', 
        compact('projetos')
        );   
    }

    public function create()
    {
        $titulo = 'Cadastro';

        return response()->view(
            'autenticacao.cadastro', 
            compact('titulo'), 
            200
        );
    }

    public function store(CadastroFormRequest $request)
    {
        if ($request->password === $request->password_confirmation) {
               
            $this->repository->add($request);

            $request->session()->flash(
                'mensagem',
                "Cadastro efetuado com sucesso. Agora realize o login."
            );

            return redirect('/login', 302);
        }
    }

    
}

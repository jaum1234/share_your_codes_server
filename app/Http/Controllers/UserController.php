<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Projeto;
use Illuminate\Http\Request;
use App\Service\EditorPerfil;
use App\Service\BuscadorDeProjeto;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserFormResquest;
use App\Http\Requests\UsuarioFormRequest;
use App\Http\Requests\UsuarioFormResquest;
use App\Http\Requests\ValidacaoNomeUsuarioRequest;

class UserController extends Controller
{
    /**
     *  Exibe a pagina de perfil
     * do usuario
     */
    public function edit(Request $request) 
    {
        $user = Auth::user();
        $mensagem = $request->session()->get('mensagem');

        return view('user.user', compact('user', 'mensagem'));
    }

    /**
     *  Edita o perfil do usuario
     */
    public function update(UsuarioFormRequest $request, Int $id)
    { 
            $usuario = User::find($id);
            $usuario->fill([
                'name' => $request->name, 
                'nickname' => $request->nickname
            ]);
            $usuario->save();

            $request->session()->flash('mensagem', 'Dados atualizados com sucesso');

            return redirect()->back();   
    }

    /**
     *  Exibe a pagina de projetos 
     * do usuario
     */
    public function meusProjetos(Request $request)
    {
        $projetos = Projeto::where('user_id', Auth::id())
        ->orderBy('nome')
        ->get();

        return view(
        'user.meus-projetos', 
        compact('projetos')
        );   
    }

    
}

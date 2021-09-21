<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Projeto;
use App\Service\Paginador;
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
    
    public function edit(Request $request) 
    {
        $user = Auth::user();
        $mensagem = $request->session()->get('mensagem');

        return view('user.user', compact('user', 'mensagem'));
    }

   
    public function update(UsuarioFormRequest $request, Int $id)
    { 
        $usuario = User::find($id);
        $usuario->fill([
            'name' => $request->name, 
            'nickname' => $request->nickname
        ]);
        $usuario->save();

        $response['success'] = true;
        $response['message'] = 'Dados atualizados com sucesso!';
        
        return json_encode($response);   
    }

    public function meusProjetos(Request $request)
    {
        $projetos = Projeto::where('user_id', Auth::id())
        ->orderBy('nome')
        ->get();

        return view(
        'editor.meus-projetos', 
        compact('projetos')
        );   
    }

    
}

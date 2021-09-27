<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\CadastroFormRequest;
use App\Service\CriadorDeUsuario;

class CadastroController extends Controller
{
    /**
     *  Exibe formulario 
     * de cadastro
     */
    public function formCadastro()
    {
        $titulo = 'Cadastro';

        return view('autenticacao.cadastro', compact('titulo'));
    }

    /**
     *  Efetua o cadastro
     */
    public function cadastrar(CadastroFormRequest $request, CriadorDeUsuario $criadorDeUsuario)
    {
        $nome = $request->name;
        $nick = $request->nickname;
        $email = $request->email;
        $senha = $request->password;
   
        $senhaHash = bcrypt($senha);

        $criadorDeUsuario->criarUsuario(
            $nome,
            $nick,
            $email,
            $senhaHash
        );

        return redirect('/login')
            ->with(
                'mensagem',
                'Cadastro efetuado com sucesso. Agora realize o login.'
                );   
    }
}

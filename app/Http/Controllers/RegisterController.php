<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Projeto;
use App\Service\Paginador;
use Illuminate\Http\Request;
use App\Service\EditorPerfil;
use App\Service\RegisterService;
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
    private $registerService;

    public function __construct(RegisterService $service)
    {
        $this->registerService = $service;
    }

    public function formCadastro()
    {

        $titulo = 'Cadastro';

        return response()->view(
            'autenticacao.cadastro', 
            compact('titulo'), 
            200
        );
    }

    public function cadastrar(Request $request)
    {
        $validator = $this->registerService->validar($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $dadosValidados = $validator->validated();

        if ($request->password === $request->password_confirmation) {
               
            $this->registerService->registrar($dadosValidados);

            $request->session()->flash(
                'mensagem',
                "Cadastro efetuado com sucesso. Agora realize o login."
            );

            return redirect('/login', 302);
        }
    }

    
}

<?php

namespace App\Http\Controllers\Auth;


use App\Models\User;
use Illuminate\Http\Request;

use App\Service\RegisterService;
use App\Http\Controllers\Controller;
use App\Service\Validadores\RegisterValidador;

class RegisterController extends Controller
{
    private $validador;

    public function __construct(RegisterValidador $registerValidador)
    {
        $this->validador = $registerValidador;
    }

    public function create()
    {

        $titulo = 'Cadastro';

        return response()->view(
            'pages.cadastro', 
            compact('titulo'), 
            200
        );
    }

    public function store(Request $request)
    {
        $validator = $this->validador->validar($request);

        if (!$validator['success']) {
            return redirect()->back()->withErrors($validator['erros']);
        }

        $dadosValidados = $validator['dados'];
               
        User::create([
            'name' => $dadosValidados['name'],
            'nickname' =>$dadosValidados['nickname'],
            'email' => $dadosValidados['email'],
            'password' => bcrypt($dadosValidados['password'])
        ]);;

        $request->session()->flash(
            'mensagem',
            "Cadastro efetuado com sucesso."
        );

        return redirect(route('login.create'), 302);
        
    }

    
}

<?php

namespace App\Http\Controllers\Auth;


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

    public function formCadastro()
    {

        $titulo = 'Cadastro';

        return response()->view(
            'pages.cadastro', 
            compact('titulo'), 
            200
        );
    }

    public function cadastrar(Request $request)
    {
        $validator = $this->validador->validar($request);

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

<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use App\Service\RegisterService;

use App\Http\Controllers\Controller;


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
            'pages.cadastro', 
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

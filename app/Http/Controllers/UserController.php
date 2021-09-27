<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Projeto;
use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $service)
    {
        $this->userService = $service;
    }
    
    public function edit(Request $request) 
    {
        $user = Auth::user();
        $mensagem = $request->session()->get('mensagem');

        return response()->view('user.user', compact('user', 'mensagem'), 200);
    }
    
    public function update(Request $request, Int $id)
    { 
        $validator = $this->userService->validar($request);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($response); 
        }

        $dadosValidatos = $validator->validated();

        $usuario = User::find($id);
        $usuario->name = $dadosValidatos['name'];
        $usuario->nickname = $dadosValidatos['nickname'];
        $usuario->save();

        $response['success'] = true;
        $response['message'] = 'Dados atualizados com sucesso!';
        
        return response()->json($response, 200);   
    }

    public function projetosUsuario(Request $request)
    {
        $projetos = Projeto::where('user_id', Auth::id())
            ->orderBy('nome')
            ->paginate(4);

        return response()->view(
        'editor.meus-projetos', 
        compact('projetos')
        );   
    }

}

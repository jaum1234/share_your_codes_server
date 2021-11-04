<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Service\AuthService;
use App\Service\Validadores\LoginValidador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    private $validador;

    public function __construct(LoginValidador $loginValidador)
    {
        $this->validador = $loginValidador;
    }
    
    public function formLogin(Request $request)
    {
        $mensagem = $request->session()->get('mensagem');
        $titulo = 'Login';

        return response()->view('pages.login', compact('mensagem', 'titulo'));
    }

    public function logar(Request $request)
    {
        $validator = $this->validador->validar($request);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $dadosValidados = $validator->validated();

        $credencials = [
            'email' => $dadosValidados['email'],
            'password' => $dadosValidados['password']
        ];

        $user = User::where('email', $request->email)->first();
        
        try {
            $this->verificarSenha($dadosValidados['password'], $user->password);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['erro' => $e->getMessage()]);
        }
        
        if (Auth::attempt($credencials)) {
            $request->session()->regenerate();
            return redirect('/projetos/criar');
        }   
    }

    private function verificarSenha($senha, $hashSenha)
    {
        if (!Hash::check($senha, $hashSenha)) {
            throw new \Exception("Senha inválida");
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    } 
}

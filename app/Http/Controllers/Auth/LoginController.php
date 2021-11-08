<?php

namespace App\Http\Controllers\Auth;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Service\Validadores\LoginValidador;

class LoginController extends Controller
{
    private $validador;

    public function __construct(LoginValidador $loginValidador)
    {
        $this->validador = $loginValidador;
    }
    
    public function create(Request $request)
    {
        $mensagem = $request->session()->get('mensagem');
        $titulo = 'Login';

        return response()->view('pages.login', compact('mensagem', 'titulo'));
    }

    public function store(Request $request)
    {
        $validator = $this->validador->validar($request);
        
        if (!$validator['success']) {
            return redirect()->back()->withErrors($validator['erros']);
        }

        $dadosValidados = $validator['dados'];

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

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    } 
}

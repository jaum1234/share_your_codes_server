<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function formLogin(Request $request)
    {
        $mensagem = $request->session()->get('mensagem');
        $titulo = 'Login';

        return view('mobile.login', compact('mensagem', 'titulo'));
    }

    public function formCadastro()
    {
        $titulo = 'Cadastro';

        return view('mobile.cadastro', compact('titulo'));
    }


    public function logar(Request $request)
    {
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return redirect()
            ->back()
            ->withInput()
            ->withErrors(['Os dados informados nao sao validos!']);
        }

        $credencials =[
            'email' => $request->email,
            'password' => $request->senha
        ];

        if (Auth::attempt($credencials, true)) {
            $request->session()->regenerate();

            return redirect('/editorDeCodigo');
        }
        return redirect()
            ->back()
            ->withInput()
            ->withErrors(['As senhas informadas nao correspondem!']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function cadastrar(Request $request)
    {
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return redirect()
            ->back()
            ->withInput()
            ->withErrors(['O E-mail informado nao é valido!']);
        }

        if (User::where('nickname', $request->nomeUsuario)->exists()) {
            return redirect()
            ->back()
            ->withInput()
            ->withErrors(['Esse nome de usuário já existe.']);
        }

        if ($request->senha === $request->confirmar_senha) {
            $senha = filter_var($request->senha, FILTER_SANITIZE_STRING);    
            $senhaHash = bcrypt($senha);

            $usuario = User::create([
                'name' => $request->nome,
                'nickname' =>$request->nomeUsuario,
                'email' => $request->email,
                'password' => $senhaHash
            ]);

            $request->session()->flash(
                'mensagem',
                "Cadastro efetuado com sucesso. Agora realize o login."
            );

            return redirect('/login');
        }

        return redirect()
            ->back()
            ->withInput()
            ->withErrors(['As senhas informadas nao correspondem']);
        
    }
}

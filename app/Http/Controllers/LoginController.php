<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     *  Exibe o formulario
     * de login
     */
    public function formLogin(Request $request)
    {
        $mensagem = $request->session()->get('mensagem');
        $titulo = 'Login';

        return view('autenticacao.login', compact('mensagem', 'titulo'));
    }

    /**
     *  Efetua o login
     */
    public function logar(LoginFormRequest $request)
    {
        $email = $request->email;
        $senha = $request->password;

        $credenciais = [
            'email' => $email,
            'password' => $senha
        ];

        $user = User::where('email', $request->email)->first();
        $hash = Hash::check($request->password, $user->password);

        if (!$hash) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['erro' => 'Dados invalidos']);
        }

        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();

            return redirect('/projetos/criar');
        }   
    }

    /**
     *  Efetua o logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

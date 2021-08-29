<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastroFormRequest;
use App\Http\Requests\LoginFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function formLogin(Request $request)
    {
        $mensagem = $request->session()->get('mensagem');
        $titulo = 'Login';

        return view('autenticacao.login', compact('mensagem', 'titulo'));
    }

  
    public function formCadastro()
    {
        $titulo = 'Cadastro';

        return view('autenticacao.cadastro', compact('titulo'));
    }

   
    public function logar (LoginFormRequest $request)
    {
        
        $credencials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $user = User::where('email', $request->email)->first();

        if (!Hash::check($request->password, $user->password)) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['erro' => 'Dados invalidos']);
        }
        
        if (Auth::attempt($credencials)) {
            $request->session()->regenerate();

            return redirect('/projetos/criar');
        }   
    }

   
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

   
    public function cadastrar(CadastroFormRequest $request)
    {
        if ($request->password === $request->password_confirmation) {
               
            $senhaHash = bcrypt($request->password);

            User::create([
                'name' => $request->name,
                'nickname' =>$request->nickname,
                'email' => $request->email,
                'password' => $senhaHash
            ]);

            $request->session()->flash(
                'mensagem',
                "Cadastro efetuado com sucesso. Agora realize o login."
            );

            return redirect('/login');
        }

        
        
    }
}
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

    public function store(Request $request)
    {
        $validator = $this->validador->validar($request);
        
        if (!$validator['success']) {
            return response()->json([
                'success' => false,
                'err' => $validator['erros']
            ]);
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
            //$request->session()->regenerate();
            return response()->json([
                'success' => true,
                'msg' => 'Usuário logado com sucesso'
            ]);
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

        return redirect(route('login.create'));
    } 
}

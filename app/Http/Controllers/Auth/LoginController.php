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
            return response()->json($validator);
        }

        $dadosValidados = $validator['dados'];

        $credentials = ['email' => $dadosValidados['email'], 'password' => $dadosValidados['password']];

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithTokenAndUserData($token);
    }

    
    public function me()
    {
        return response()->json(Auth::user());
    }

    
    public function destroy()
    {
        Auth::logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

   
    public function refresh()
    {
        return $this->respondWithToken(Auth::refresh());
    }

   
    protected function respondWithTokenAndUserData($token)
    {
        return response()->json([
            'success' => true,
            'user' => [
                'id' => Auth::user()->id, 
                'name' => Auth::user()->name, 
                'nickname' => Auth::user()->nickname
            ],
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 20
        ]);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'success' => true,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 20
        ]);
    }
}

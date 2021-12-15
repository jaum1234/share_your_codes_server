<?php

namespace App\Http\Controllers\Auth;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\ResponseOutput\ResponseOutput;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Service\Validadores\LoginValidador;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    private LoginValidador $validador;

    public function __construct(LoginValidador $loginValidador)
    {
        $this->validador = $loginValidador;
    }

    public function store(Request $request): JsonResponse
    {
        $validator = $this->validador->validar($request);

        if (!$validator['success']) {
            return (new ResponseOutput(
                false,
                $validator,
                400,
            ))->jsonOutput();
        }

        $dadosValidados = $validator['dados'];

        $user = User::where('email', $dadosValidados['email'])->first();

        if (!Hash::check($dadosValidados['password'], $user->password)) {
            return (new ResponseOutput(
                false,
                [],
                400,
                'Senha incorreta'
            ))->jsonOutput();
        }

        $credentials = ['email' => $dadosValidados['email'], 'password' => $dadosValidados['password']];

        if (!$token = Auth::attempt($credentials)) {
            return (new ResponseOutput(
                false,
                [],
                401,
                'Erro ao realizar a autenticaçao.',
            ))->jsonOutput();
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
        return (new ResponseOutput(
            true,
            [],
            201,
            'Logout realizado com sucesso!'
        ))->jsonOutput();
    }

   
    public function refresh(): JsonResponse
    {
        return $this->respondWithToken(Auth::refresh());
    }

    protected function respondWithTokenAndUserData($token): JsonResponse
    {
        return (new ResponseOutput(
            true,
            [
                    'user' => [
                        'id' => Auth::user()->id, 
                        'name' => Auth::user()->name, 
                        'nickname' => Auth::user()->nickname
                    ],
                    'access_token' => $token,
                    'token_type' => 'bearer',
                    'expires_in' => Auth::factory()->getTTL() * 5
            ],
            200,
        ))->jsonOutput(); 
    }

    protected function respondWithToken($token): JsonResponse
    {
        return (new ResponseOutput(
            true,
            [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => Auth::factory()->getTTL() * 5
            ],
            200
        ))->jsonOutput(); 
    }
}

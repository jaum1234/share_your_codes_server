<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\BaseController;
use App\Service\Validadores\LoginValidador;

class LoginController extends BaseController
{
    private LoginValidador $validador;
    private string $accessToken;

    public function __construct(LoginValidador $loginValidador)
    {
        parent::__construct();
        $this->validador = $loginValidador;
    }

    public function store(Request $request): JsonResponse
    {
        $validator = $this->validador->validar($request);

        if (!$validator['success']) 
        {
            return $this->responseOutput->validationErrors($validator);
        }

        $dadosValidados = $validator['dados'];

        $user = User::where('email', $dadosValidados['email'])->first();

        if (!Hash::check($dadosValidados['password'], $user->password)) {
            return $this->responseOutput->set(
                false,
                [],
                "Senha inválida.",
                400
            );
        }

        $credentials = ['email' => $dadosValidados['email'], 'password' => $dadosValidados['password']];

        if (!$this->accessToken = Auth::attempt($credentials)) {
            return $this->responseOutput->set(
                false,
                [],
                "Credenciais inválidas."
            );
        }

        return $this->respondWithTokenAndUserData();
    }

    
    public function me()
    {
        return response()->json(Auth::user());
    }

    
    public function destroy()
    {
        Auth::logout();

        $response = $this->responseOutput->set(
            true,
        );

        return response()->json($response);
    }

   
    public function refresh(): JsonResponse
    {
        $this->accessToken = Auth::refresh();   
        return $this->respondWithToken();
    }

    protected function respondWithTokenAndUserData(): JsonResponse
    {
        $response = $this->responseOutput->set(
            true, 
            [
                'user' => [
                    'id' => Auth::user()->id, 
                    'name' => Auth::user()->name, 
                    'nickname' => Auth::user()->nickname
                ],
                'token' => $this->token()
            ],
            "Login realizado com sucesso."
        );

        return $response;
    }

    protected function respondWithToken(): JsonResponse
    {
        $response = $this->responseOutput->set(
            true,
            ['token' => $this->token()],
            "Token enviado com sucesso."
        );

        return response()->json($response, 200);
    }

    private function token(): array
    {
        return [
            'access_token' => $this->accessToken,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL()
        ];
    }
}

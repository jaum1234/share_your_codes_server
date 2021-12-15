<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\ResponseOutput\ResponseOutput;
use App\Service\Validadores\RegisterValidador;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    private RegisterValidador $validator;

    public function __construct(RegisterValidador $registerValidator)
    {
        $this->validator = $registerValidator;
    }

    public function store(Request $request): JsonResponse
    {
        $validator = $this->validator->validar($request);

        if (!$validator['success']) {
            return (new ResponseOutput(
                false,
                $validator,
                400,
            ))->jsonOutput();
        }

        $dadosValidados = $validator['dados'];

        $user = User::create([
            'email' => $dadosValidados['email'],
            'nickname' => $dadosValidados['nickname'],
            'name' => $dadosValidados['name'],
            'password' => bcrypt($dadosValidados['password']) 
        ]);

        return (new ResponseOutput(true, [], 201, 'Cadastro realizado com sucesso!'))->jsonOutput();
    }
}
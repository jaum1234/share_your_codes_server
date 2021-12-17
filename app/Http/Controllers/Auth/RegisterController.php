<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use App\Service\Validadores\RegisterValidador;
use Illuminate\Http\JsonResponse;

class RegisterController extends BaseController
{
    private RegisterValidador $validator;

    public function __construct(RegisterValidador $registerValidator)
    {
        parent::__construct();
        $this->validator = $registerValidator;
    }

    public function store(Request $request): JsonResponse
    {
        $validator = $this->validator->validar($request);

        if (!$validator['success']) {
            return $this->responseOutput->validationErrors($validator);
        }

        $dadosValidados = $validator['dados'];

        $user = User::create([
            'email' => $dadosValidados['email'],
            'nickname' => $dadosValidados['nickname'],
            'name' => $dadosValidados['name'],
            'password' => bcrypt($dadosValidados['password']) 
        ]);

        $response = $this->responseOutput->set(
            true,
            [],
            "Cadastro realizado com sucesso.",
            201
        );

        return $response;
    }
}
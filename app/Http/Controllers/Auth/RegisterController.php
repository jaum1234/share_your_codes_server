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
    }

    public function store(Request $request): JsonResponse
    {
        $validator = RegisterValidador::validar($request);

        if ($validator->fails()) {
            return $this->responseOutput->validationErrors($validator->errors());
        }

        $dadosValidados = $validator->validated();

        User::create([
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
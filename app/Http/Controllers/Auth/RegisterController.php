<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\BaseController;
use App\Service\Validadores\RegisterValidador;
use Illuminate\Validation\ValidationException;

class RegisterController extends BaseController
{
    public function store(Request $request): JsonResponse
    {
        try {
            $validator = RegisterValidador::validar($request);
        } catch (ValidationException $e) {
            return $this->responseOutput->validationErrors($e->errors());
        }

        $dadosValidados = $validator;

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
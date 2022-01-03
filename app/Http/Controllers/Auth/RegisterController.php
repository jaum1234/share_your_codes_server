<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\BaseController;
use App\Service\Validadores\RegisterValidador;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\ValidationException;

class RegisterController extends BaseController
{
    private RegisterValidador $validador;

    public function __construct(RegisterValidador $registerValidador)
    {
        parent::__construct();
        $this->validador = $registerValidador;

    }
    
    public function store(Request $request): JsonResponse
    {
        try {
            $validator = $this->validador->validar($request);
        } catch (ValidationException $e) {
            return $this->responseOutput->validationErrors($e->errors());
        }

        $dadosValidados = $validator;

        $user = User::create([
            'email' => $dadosValidados['email'],
            'nickname' => $dadosValidados['nickname'],
            'name' => $dadosValidados['name'],
            'password' => bcrypt($dadosValidados['password']) 
        ]);

        //event(new Registered($user));
        //ainda será implementado...
        
        $response = $this->responseOutput->set(
            true,
            [],
            "Cadastro realizado com sucesso.",
            201
        );

        return $response;
    }
}
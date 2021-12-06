<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Validadores\RegisterValidador;

class RegisterController extends Controller
{
    private $validator;

    public function __construct(RegisterValidador $registerValidator)
    {
        $this->validator = $registerValidator;
    }

    public function store(Request $request)
    {
        $validator = $this->validator->validar($request);

        if (!$validator['success']) {
            return response()->json($validator);
        }

        $dadosValidados = $validator['dados'];

        $user = User::create([
            'email' => $dadosValidados['email'],
            'nickname' => $dadosValidados['nickname'],
            'name' => $dadosValidados['name'],
            'password' => bcrypt($dadosValidados['password']) 
        ]);

        return response()->json([
            'success' => true,
        ]);
    }
}
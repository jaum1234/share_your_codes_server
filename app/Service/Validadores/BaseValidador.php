<?php 

namespace App\Service\Validadores;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

abstract class BaseValidador 
{
    abstract public function validar(Request $request);

    public function resultado($validator)
    {
        if ($validator->fails()) {
            return [
                'success' => false,
                'erros' => $validator->errors()
            ];
        }

        return [
            'success' => true,
            'dados' => $validator->validated()
        ];
    }
}
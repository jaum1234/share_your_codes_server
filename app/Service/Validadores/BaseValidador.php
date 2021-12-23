<?php 

namespace App\Service\Validadores;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


abstract class BaseValidador
{
    abstract public static function validar(Request $request): array;

    protected static function resultado($validador)
    {
        if ($validador->fails()) {
            throw new ValidationException($validador);
        }

        return $validador->validated();
    }
}
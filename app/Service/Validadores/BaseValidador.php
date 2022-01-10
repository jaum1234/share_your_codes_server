<?php 

namespace App\Service\Validadores;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


abstract class BaseValidador
{
    public function validar(Request $request): array
    {
        $validador = Validator::make(
            $request->all(),
            $this->rules()
        );

        return $this->resultado($validador);
    }

    protected function resultado($validador)
    {
        if ($validador->fails()) {
            throw new ValidationException($validador);
        }

        return $validador->validated();
    }

    abstract protected function rules(): array;
}
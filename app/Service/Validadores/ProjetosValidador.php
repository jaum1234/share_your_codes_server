<?php 
namespace App\Service\Validadores;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjetosValidador extends BaseValidador
{
    public function validar(Request $request)
    {
        $validador = Validator::make($request->all(), [
            'nome' => 'required|string',
            'descricao' => 'required|string',
            'cor' => 'string',
            'codigo' => 'required|string'
        ], [
            'required' => 'Esse campo é obrigatório.'
        ]);

        return $this->resultado($validador);
    }
}
<?php 
namespace App\Service\Validadores;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjetosValidador
{
    public function validar(Request $request)
    {
        $validador = Validator::make($request->all(), [
            'nome' => 'required|string',
            'descricao' => 'required|string',
            'cor' => 'required',
            'codigo' => 'required'
        ], [
            'required' => 'Esse campo é obrigatório.'
        ]);

        return $validador;
    }
}